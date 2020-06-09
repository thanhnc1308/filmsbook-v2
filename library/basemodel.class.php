<?php

class BaseModel extends SQLQuery_v2 {

    protected $_model;

    function __construct() {

        global $inflect;

        $this->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->_limit = PAGINATE_LIMIT;
        $this->_model = get_class($this);
        $this->_table = $this->getTableName();
        if (!isset($this->abstract)) {
            $this->_describe();
        }
    }

    function getTableName() {
        return strtolower($inflect->pluralize($this->_model));
    }

    function __destruct() {
        
    }

}
