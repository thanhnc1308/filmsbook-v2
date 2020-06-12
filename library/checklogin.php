<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // Overriding the error handler
    function errorHandlerCatchUndefinedIndex($errno, $errstr, $errfile, $errline ) {
        // We are only interested in one kind of error
        if ($errstr=='Undefined index: username') {
            //We throw an exception that will be catched in the test
            throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
        }
        return false;
    }
    set_error_handler("errorHandlerCatchUndefinedIndex");
    
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strcmp($actual_link,'http://localhost/filmsbook-v2/login') != 0){
        try{
            $username = $_SESSION['username'];
        } catch (Exception $ex) {
            restore_error_handler();
            header("Location: http://localhost/filmsbook-v2/login");
            exit();
        }
    }

?>
