<?php

class LoginController extends BaseController
{

    function beforeAction()
    {
    }

    function view($userId = null)
    {
    }

    function index()
    {
    }

    function auth()
    {
        $this->render = 0; //not render whole page

        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        $result = $this->Login->checkUser($username, $password);

        if($result!=false){
            session_start();
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
