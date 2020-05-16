<?php

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
    
    /**
     * func get connection to database with a connectionString
     * @author ThanhNC 16.05.2020
     */
    function getConnection() {
        return $this->_connection;
    }

    function selectAll() {
        $query = 'select * from `' . $this->_table . '`';
        return $this->query($query);
    }

    function select($id) {
        $query = 'select * from `' . $this->_table . '` where `id` = \'' . mysqli_real_escape_string($this->_connection, $id) . '\'';
        return $this->query($query, 1);
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

    /** Get number of rows * */
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

}
