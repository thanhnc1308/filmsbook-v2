<?php

<<<<<<< HEAD
class FilmsController extends BaseController {
    public function index() {
        echo "Hello, world!";
=======
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
        $films = $this->Film->search();
        $this->set('films', $films);
    }
    
    function create() {
        
    }
    
    function store() {
//        $film = new Film();
////        $film->id = 2;
//        $film->name = "Star wars";
//        $film->description = "Hello World!";
//        $film->save();
//        echo '<pre>' , var_dump($film->id) , '</pre>';
        if(isset($_POST['name']) && isset($_POST['description'])) {
            $name = $_POST['name'];
            $description = $_POST['name'];
            
            $film = new Film();
            $film->name = $name;
            $film->description = $description;
            $film->save();
            
            $this->set('film', $film);
        }
    }
    
    function afterAction() {
        
>>>>>>> 7751f6d9a8b7475fcaf202deb866723dbeaa60b8
    }
}