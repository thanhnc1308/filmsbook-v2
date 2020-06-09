<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of company
 *
 * @author lamnt
 */
class Company extends BaseModel {
    var $hasManyAndBelongsToMany = array(
        'Film' => 'Film'
    );
}
