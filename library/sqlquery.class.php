<?php

require_once (ROOT . DS . 'core' . DS . 'log.php');
require_once (ROOT . DS . 'core' . DS . 'constant.php');

class SQLQuery {

    protected $_connection;
    protected $_result;

    /** Connects to database * */
    function connect($address, $account, $pwd, $dbname) {
        $this->_connection = @mysqli_connect($address, $account, $pwd);
        if ($this->_connection) {
            if (mysqli_select_db($this->_connection, $dbname)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    /** Disconnects from database * */
    function disconnect() {
        if (@mysqli_close($this->_connection) != 0) {
            return 1;
        } else {
            return 0;
        }
    }

    // #region CRUD

    /**
     * func select all rows in table
     * @return type
     */
    function selectAll() {
        $query = 'select * from ' . DEFAULT_SCHEMA . '.' . $this->_table . ' order by modified_date ';
        $query = $this->escapeSecureSQL($query);
        return $this->query($query);
    }

    /**
     * func select by id
     * @param type $id
     * @return type
     */
    function select($id) {
        $query = 'select * from ' . DEFAULT_SCHEMA . '.' . $this->_table . ' where id = ' . $this->escapeSecureSQL($id);
        $query = $this->escapeSecureSQL($query);
        return $this->query($query, 1);
    }

    /**
     * func select a view
     * @param type $viewName
     */
    function selectByView($viewName) {
        $query = 'select * from ' . DEFAULT_SCHEMA . '.' . $viewName . ' order by modified_date ';
        $query = $this->escapeSecureSQL($query);
        return $this->query($query);
    }

    /** Custom SQL Query * */
    function query($query, $singleResult = 0) {

        $this->_result = mysqli_query($this->_connection, $query);

        if (preg_match("/select/i", $query)) {
            $result = array();
            $table = array();
            $field = array();
            $tempResults = array();
            $numOfFields = mysqli_num_fields($this->_result);

            for ($i = 0; $i < $numOfFields; ++$i) {
                $colObj = mysqli_fetch_field_direct($this->_result, $i);
                array_push($table, $colObj->table);
                array_push($field, $colObj->name);
            }


            while ($row = mysqli_fetch_row($this->_result)) {
                for ($i = 0; $i < $numOfFields; ++$i) {
                    $table[$i] = trim(ucfirst($table[$i]), "s");
                    $tempResults[$table[$i]][$field[$i]] = $row[$i];
                }
                if ($singleResult == 1) {
                    mysqli_free_result($this->_result);
                    return $tempResults;
                }
                array_push($result, $tempResults);
            }
            mysqli_free_result($this->_result);
            return($result);
        }
    }

    // #endregion CRUD
    // #region common

    /** Get number of rows * */

    /**
     * func get connection to database with a connectionString
     * @author ThanhNC 16.05.2020
     */
    function getConnection() {
        return $this->_connection;
    }

    /**
     * func get number of rows
     * @return type
     */
    function getNumRows() {
        return mysqli_num_rows($this->_result);
    }

    /** Free resources allocated by a query * */
    function freeResult() {
        mysqli_free_result($this->_result);
    }

    /** Get error string * */
    function getError() {
        return mysqli_error($this->_connection);
    }

    /**
     * func escapes special characters in a string for use in an SQL statement
     * to avoid SQL injection
     * @param type $sql
     * @author ThanhNC 16.05.2020
     */
    function escapeSecureSQL($sql) {
        return mysqli_real_escape_string($this->_connection, $sql);
    }

    // #endregion common
    // #region override

    /**
     * func get field name of primary key
     * @return string
     * @author ThanhNC 16.05.2020
     */
    function getIdField() {
        return null;
    }

    /**
     * func get vaue of primary key
     * @author ThanhNC 16.05.2020
     */
    function getIdValue() {
        return null;
    }

    // #endregion override
}
