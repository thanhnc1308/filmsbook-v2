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
        $this->render = 0; //not render whole page

        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        $result = $this->Signup->checkExistedUser($username, $password);
        if($result==false){
            $isCreated = $this->Signup->createNewUser($username, $password);
            
            //check successful query later
            echo true;
        }
    }
}