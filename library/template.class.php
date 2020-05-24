<?php

class Template {

    protected $variables = array();
    protected $_controller;
    protected $_action;

    function __construct($controller, $action) {
        $this->_controller = $controller;
        $this->_action = $action;
    }

    /** Set Variables * */
    function set($name, $value) {
        $this->variables[$name] = $value;
    }

    /**
     * Display Template
     * doNotRenderHeader enables you to not output headers for a particular action. 
     * This can be used in AJAX calls when you do not want to return the headers. 
     * It has to be called by the controller 
     * e.g. $this->doNotRenderHeader = 1;
     * @param type $doNotRenderHeader
     */
    function render($doNotRenderHeader = 0) {

        $html = new HTML;
        extract($this->variables);

        if ($doNotRenderHeader == 0) {

            if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'header.php')) {
                include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'header.php');
            } else {
                include (ROOT . DS . 'application' . DS . 'layouts' . DS . 'header.php');
            }
        }

        if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.php')) {
            include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.php');
        }

        if ($doNotRenderHeader == 0) {
            if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'footer.php')) {
                include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'footer.php');
            } else {
                include (ROOT . DS . 'application' . DS . 'layouts' . DS . 'footer.php');
            }
        }
    }

}
