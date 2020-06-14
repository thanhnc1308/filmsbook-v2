<?php

class LoginController extends BaseController
{

    /**
     * When user try to login again or logout
     * => Delete session
     */
    function beforeAction()
    {
        $this->set('userid', '');
        $this->set('username', '');
        $this->set('role', '');

        if (!(session_status() == PHP_SESSION_NONE)) {
            session_destroy();
        }
    }

    function view($userId = null)
    {
    }

    function index()
    {
    }

    /**
     * Check user input and check account in database
     * If input is corret, set session
     */
    function auth()
    {
        $this->render = 0; //not render whole page

        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        $result = $this->Login->checkUser($username, $password);

        if($result!=false){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['user_id'] = $result[0];
            $_SESSION['username'] = $result[1];
            $_SESSION['role'] = $result[2];
            echo true;
        }
        

    }

    function afterAction()
    {
    }
}
