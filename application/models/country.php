<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of country
 *
 * @author lamnt
 */
class Country extends BaseModel {
    var $hasManyAndBelongsToMany = array(
        'Film' => 'Film'
    );
}
