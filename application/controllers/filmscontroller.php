<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FilmsController extends BaseController {
    function beforeAction() {
        
    }
    
    function index() {
        $this->set('title', 'Index');
        $this->set('film', 'Titanic');
    }
    
    function afterAction() {
        
    }
}