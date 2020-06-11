<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Film extends BaseModel {
    var $hasManyAndBelongsToMany = array(
        'Genre' => 'Genre',
        'Company' => 'Company',
        'Country' => 'Country',
        'Actor' => 'Actor'
    );
    
    var $hasMany = array(
        'Review' => 'Review'
    );
    
    function save() {
        $query = '';
        if ($this->id) {
            // update the entity
            $updates = '';
            foreach ($this->_describe as $field) {
                if ($this->$field) {
                    $updates .= '`' . $field . '` = \'' . $this->escapeSecureSQL($this->$field) . '\',';
                }
            }

            $updates = substr($updates, 0, -1);

            $query = 'UPDATE ' . $this->_table . ' SET ' . $updates . ' WHERE `id`=\'' . $this->escapeSecureSQL($this->id) . '\'';
        } else {
            // create new entity
            $fields = '';
            $values = '';
            foreach ($this->_describe as $field) {
                if ($this->$field) {
                    $fields .= '`' . $field . '`,';
                    $values .= '\'' . $this->escapeSecureSQL($this->$field) . '\',';
                }
            }
            $values = substr($values, 0, -1);
            $fields = substr($fields, 0, -1);

            $query = 'INSERT INTO ' . $this->_table . ' (' . $fields . ') VALUES (' . $values . ')';
        }
        $this->_result = mysqli_query($this->_connection, $query);
        
        // get the last recorded id
        if($this->_result) {
            $last_id = mysqli_insert_id($this->_connection);
        } else {
            $last_id = -1;
        }
        
        $this->clear();
        return $last_id;
    }
}