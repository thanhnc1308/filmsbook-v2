<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of genrescontroller
 *
 * @author lamnt
 */
class GenresController extends BaseController {
    function beforeAction() {
        
    }
    
    function index() {
        $genres = $this->Genre->search();
        $this->set('genres', $genres);
    }
    
    function create() {
        
    }
    
    function store() {        
        if(isset($_POST['moviedb_id']) && isset($_POST['name'])) {
            $name = $_POST['name'];
            $moviedb_id = $_POST['moviedb_id'];
            
            $genre = new Genre();
            $genre->name = $name;
            $genre->moviedb_id = $moviedb_id;
            $genre->save();
            
            $this->set('genre', $genre);
        }
    }
    
    function afterAction() {
        
    }
}
