<?php

class LogoutController extends BaseController{

    function beforeAction()
    {
        $this->set('userid', '');
        $this->set('username', '');
        $this->set('role', '');

        if (!(session_status() == PHP_SESSION_NONE)) {
            session_destroy();
        }else{
            session_start();
            session_destroy();
        }

        $this->set('session', 0);
    }

    function view($userId = null)
    {
    }

    function index()
    {
    }

    function afterAction()
    {
    }

}
?>