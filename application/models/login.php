<?php

class Login extends BaseModel
{

    function getTableName()
    {
        return "users";
    }

    function checkUser($username, $password)
    {
        $sql = "select * from " . DEFAULT_SCHEMA . ".users where username = '" . $username . "'";
        $result = $this->custom($sql);
        if (empty($result)) {
            return false;
        } else {
            foreach($result as $user){
                $hashed_password =  $user['User']['password'];
                $role = $user['User']['role'];
                $user_id = $user['User']['id'];
            }
            if(password_verify($password, $hashed_password)){
                return array($user_id, $username, $role);
            }
            return false;
        }
    }
}
