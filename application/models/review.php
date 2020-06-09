<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of review
 *
 * @author lamnt
 */
class Review extends BaseModel {
    var $hasOne = [
        'Film' => 'Film',
        'User' => 'User'
    ];
}
