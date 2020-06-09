<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of genre
 *
 * @author lamnt
 */
class Genre extends BaseModel {
    var $hasManyAndBelongsToMany = array(
        'Film' => 'Film'
    );
}
