<?php    
 
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
 
$uri = $_SERVER['REQUEST_URI'];
//echo $uri, PHP_EOL; // Outputs: URI
 
//$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
 
//$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//echo $url, PHP_EOL; // Outputs: Full URL
 
//$query = $_SERVER['QUERY_STRING'];
//echo $query, PHP_EOL; // Outputs: Query String

require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');
