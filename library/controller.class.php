<?php
include (ROOT . DS . 'core' . DS . 'log.php');

class Controller {

    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_template;

    function __construct($model, $controller, $action) {

        $this->_controller = $controller;
        $this->_action = $action;
        $this->_model = $model;

        $this->$model = new $model;
        $this->_template = new Template($controller, $action);
    }

    function __destruct() {
        // render template while destroy the class
        $this->_template->render();
    }
    
    // #region common
    /**
     * func set custom variables for template
     * @param type $name
     * @param type $value
     */
    function set($name, $value) {
        $this->_template->set($name, $value);
    }
    
    /**
     * func get class base
     * @author ThanhNC 16.05.2020
     */
    function getBase() {
        return $this;
    }
    // #endregion common
    
    // #region CRUD
    function view($id = null, $name = null) {
        $this->set('title', $name . ' - My Todo List App');
        $todo = $this->Item->select($id);
        $this->set('todo', $todo);
    }

    function viewall() {
        $this->set('title', 'All Items - My Todo List App');
        $todos = $this->Item->selectAll();
        $this->set('todo', $todos);
    }

    function insert() {
        $todo = $_POST['todo'];
        $this->set('title', 'Success - My Todo List App');
        $this->set('todo', $this->Item->query('insert into items (name) values (\'' . mysqli_real_escape_string($this->Item->getConnection(), $todo) . '\')'));
    }

    function delete($id = null) {
        $this->set('title', 'Success - My Todo List App');
        $this->set('todo', $this->Item->query('delete from items where id = \'' . mysqli_real_escape_string($this->Item->getConnection(), $id) . '\''));
    }
    // #endregion CRUD
    
    // #region override
    
    // #endregion override
}
