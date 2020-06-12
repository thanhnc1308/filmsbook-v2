<?php

class BaseController {

    protected $_controller;
    protected $_action;
    protected $_template;
    public $doNotRenderHeader;
    public $render;
    protected $userId;
    protected $userName;
    protected $role;

    function __construct($controller, $action) {
        $this->_controller = ucfirst($controller);
        $this->_action = $action;

        $model = $this->getModelName($controller);
        $this->doNotRenderHeader = 0;
        $this->render = 1;
        $this->$model = new $model;
        $this->_template = new Template($controller, $action);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->userId = '';
        $this->userName = '';
        $this->role = '';
        if (isset($_SESSION["user_id"])) {
            $this->userId = $_SESSION["user_id"];
            $this->userName = $_SESSION["username"];
            $this->role = $_SESSION["role"];
        }
        $this->set('userid', $this->userId);
        $this->set('username', $this->userName);
        $this->set('role', $this->role);
    }

    function getUserId() {
        return $this->userId;
    }

    function getUserName() {
        return $this->userName;
    }

    function getUserRole() {
        return $this->role;
    }

    function set($name, $value) {
        $this->_template->set($name, $value);
    }

    function getModelName($controller) {
        global $inflect;
        return ucfirst($inflect->singularize($controller));
    }

    function __destruct() {
        if ($this->render) {
            $this->_template->render($this->doNotRenderHeader);
        }
    }

    function beforeAction()
    {

    }

    function afterAction()
    {
    }
}
