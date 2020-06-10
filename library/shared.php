<?php
require_once(ROOT . DS . 'core' . DS . 'constant.php');

/** Check if environment is development and display errors * */
function setReporting()
{
    if (DEVELOPMENT_ENVIRONMENT == true) {
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors', 'Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
    }
}

/** Check register globals and remove them * */
function unregisterGlobals()
{
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

/** Secondary Call Function * */
function performAction($controller, $action, $queryString = null, $render = 0)
{
    $controllerName = ucfirst($controller) . 'Controller';
    $dispatch = new $controllerName($controller, $action);
    $dispatch->render = $render;
    return call_user_func_array(array($dispatch, $action), $queryString);
}

/** Routing * */
function routeURL($url)
{
    global $routing;

    foreach ($routing as $pattern => $result) {
        if (preg_match($pattern, $url)) {
            return preg_replace($pattern, $result, $url);
        }
    }

    return ($url);
}

/**
 * func does the main processing
 * yoursite.com/controllerName/actionName/queryString
 * takes the URL which we have received from index.php 
 * and separates it out as $controller, $action 
 * and the remaining as $queryString. 
 * $model is the singular version of $controller
 */
function callHook()
{
    global $uri;

    $urlArray = array();
    $urlArray = explode("/", $uri);
    // ThanhNC 16.5.2020 - shift 2 times to remove first space and root
    array_shift($urlArray);
    array_shift($urlArray);

    $controller = $urlArray[0];
    array_shift($urlArray);
    $action = $urlArray[0];
    array_shift($urlArray);
    // ThanhNC 16.5.2020 - queryString should be an array to pass in param 2 of call_user_func_array
    $queryString = $urlArray;

    $controllerName = $controller;
    $controller = ucwords($controller);
    $model = rtrim($controller, 's');
    $controller .= 'Controller';

    $dispatch = new $controller($model, $controllerName, $action);

    if ((int) method_exists($controller, $action)) {
        call_user_func_array(array($dispatch, $action), $queryString);
    } else {
        echo 'An error has occured in shared.php';
    }
}

/**
 * func check if it is the homepage then return the default controller
 * @author John Doe <john.doe@example.com>
 */
function isDefaultController($uri)
{
    global $uri;
    $urlArray = explode("/", $uri);
    array_shift($urlArray); // shift the space
    array_shift($urlArray); // shift the base
    $controller = $urlArray[0];
    if (empty($controller)) {
        return true;
    } else {
        return false;
    }
}

function callHook_v2()
{
    global $url;
    global $uri;
    global $default;

    $queryString = array();
    if (isDefaultController($uri)) {
        $controller = $default['controller'];
        $action = $default['action'];
    } else {
        $uri = routeURL($uri);
        $urlArray = array();
        $urlArray = explode("/", $uri);
        array_shift($urlArray); // shift the space
        array_shift($urlArray); // shift the base
        $controller = $urlArray[0];
        array_shift($urlArray);
        if (!empty($urlArray[0])) {
            $action = $urlArray[0];
            array_shift($urlArray);
        } else {
            $action = 'index'; // Default Action
        }
        $queryString = $urlArray;
    }

    // if ($controller != 'library') {
        try {
            $controllerName = ucfirst($controller) . 'Controller';
            if (class_exists($controllerName)) {
                $dispatch = new $controllerName($controller, $action);
                if ((int) method_exists($controllerName, $action)) {
                    call_user_func_array(array($dispatch, "beforeAction"), $queryString);
                    call_user_func_array(array($dispatch, $action), $queryString);
                    call_user_func_array(array($dispatch, "afterAction"), $queryString);
                } else {
                }
            } else {
            }
        } catch (Exception $ex) {
            // do something
            echo $ex;
        }
    // } else {
        // require_once(ROOT . DS . 'library' . DS . 'livesearch.php' . $queryString);
    // }
}

/**
 * auto load our classes
 */
function __autoload($className)
{
    try {
        if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php')) {
            require_once(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php');
        } else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
            require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php');
        } else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php')) {
            require_once(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php');
        } else {
            require_once(ROOT . DS . 'application' . DS . 'pages' . DS . 'notfound.php');
        }
    } catch (Exception $ex) {
    }
}

/** GZip Output * */
function gzipOutput()
{
    $ua = $_SERVER['HTTP_USER_AGENT'];

    if (0 !== strpos($ua, 'Mozilla/4.0 (compatible; MSIE ') || false !== strpos($ua, 'Opera')) {
        return false;
    }

    $version = (float) substr($ua, 30);
    return ($version < 6 || ($version == 6 && false === strpos($ua, 'SV1')));
}

/** Get Required Files * */
gzipOutput() || ob_start("ob_gzhandler");


$cache = new Cache();
$inflect = new Inflection();

setReporting();
unregisterGlobals();
//callHook();
callHook_v2();
