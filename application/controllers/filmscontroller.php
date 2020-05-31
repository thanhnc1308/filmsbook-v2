<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//class FilmObject {
//    public $id;
//    public $name;
//    public $description;
//    
//    public function __construct($array) {
//        $this->id = $array['id'];
//        $this->name = $array['name'];
//        $this->description = $array['description'];
//    }
//}

class FilmsController extends BaseController {
    function beforeAction() {
        
    }
    
    function view() {
        
    }
    
    function index() {
//        $this->Category->orderBy('name', 'ASC');
//        $this->Category->showHasOne();
//        $this->Category->showHasMany();
//        $this->Category->where('parent_id', '0');
//        $this->Film->orderBy('name', 'ASC');
//        $this->Film->where('id', '1');
        $films = $this->Film->search();
//        $this->set('categories', $categories);
//        dd($films);
        $this->set('films', $films);
    }
    
    function create() {
        
    }
    
    function store() {
        
    }
    
    function afterAction() {
        
    }
}