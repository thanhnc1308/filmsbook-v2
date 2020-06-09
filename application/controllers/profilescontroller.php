<?php

class ProfilesController extends BaseController {

    function beforeAction() {
        include(dirname(__DIR__).'/../library/checklogin.php');
    }

    function view($profileId = null) {

    }

    function index() {

    }
    
    function create() {

    }

    function afterAction() {
        
    }

}
