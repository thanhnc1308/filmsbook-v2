<?php

class SignupController extends BaseController {

    function beforeAction() {

    }

    function view($userId = null) {

    }

    function index() {

    }

    function afterAction() {

    }

    function auth(){
        // $this->render = 0; //not render whole page

        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        $result = $this->Signup->checkUser($username, $password);
        echo "result".$result;
        if($result==true){
            header("Location: http://localhost/filmsbook-v2/login");
            exit();
        }
    }
}