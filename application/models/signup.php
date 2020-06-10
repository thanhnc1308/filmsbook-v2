<?php

class Signup extends BaseModel {

    function getTableName() {
        return "users";
    }
    
    function checkUser($username, $password){
        $searchUserByName = "select * from " . DEFAULT_SCHEMA. ".users where username = '" .$username ."'";
        $user = $this->custom($searchUserByName);
        if(empty($user)){
            $insertUser = "insert into " .DEFAULT_SCHEMA. ".users(username, password , created_at , updated_at , `role` ) values ('". $username ."','" 
            .password_hash($password, PASSWORD_BCRYPT) ."', now(), now(), 'user')";
            echo $insertUser;
            $this->custom($insertUser);
            return true;
        }else{
            return false;
        }
    }
}