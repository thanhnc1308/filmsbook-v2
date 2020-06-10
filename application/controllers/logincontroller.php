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
            $_SESSION['username'] = $result[0];
            $_SESSION['role'] = $result[1];
            return 'true';
        }
        

    }

    function afterAction()
    {
    }
}
