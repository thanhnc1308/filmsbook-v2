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
        'Country' => 'Contry'
    );
}