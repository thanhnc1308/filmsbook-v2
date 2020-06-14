<?php

class Signup extends BaseModel {

    function getTableName() {
        return "users";
    }
    
    function checkExistedUser($username, $password){

        $username = $this->escapeSecureSQL($username);
        $password = $this->escapeSecureSQL($password);

        $searchUserByName = "select * from " . DEFAULT_SCHEMA. ".users where username = '" .$username ."'";
        $user = $this->custom($searchUserByName);
        if(empty($user)){
            return false;
        }else{
            return true;
        }
    }

    function createNewUser($username, $password){

        $username = $this->escapeSecureSQL($username);
        $password = $this->escapeSecureSQL($password);
        
        $insertUser = "insert into " .DEFAULT_SCHEMA. ".users(username, password , created_at , updated_at , `role` ) values ('". $username ."','" 
        .password_hash($password, PASSWORD_BCRYPT) ."', now(), now(), 'user')";
        $result = $this->custom($insertUser);
        return $result;
    }
}