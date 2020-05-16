<?php

class Model extends SQLQuery {

    protected $_model;

    function __construct() {
        $this->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->_model = get_class($this);
        $this->_table = strtolower($this->_model) . "s";
    }

    function __destruct() {
        
    }
    
    /**
     * func get field name of primary key
     * @return string
     * @author ThanhNC 16.05.2020
     */
    function getIdField() {
        return '';
    }

}
