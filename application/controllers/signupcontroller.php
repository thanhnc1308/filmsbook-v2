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

    /**
     * Check the input from user and then check account in database
     * If not found, then create new account 
     */
    function auth(){
        $this->render = 0; //not render whole page

        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        $result = $this->Signup->checkExistedUser($username, $password);
        if($result==false){
            $isCreated = $this->Signup->createNewUser($username, $password);

            echo true;
        }
    }
}