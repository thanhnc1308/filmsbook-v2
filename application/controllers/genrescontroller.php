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
        if(isset($_POST['name'])) {
            $name = $_POST['name'];
            // avoid adding duplicate genre
            $genre = new Genre();
            $genre->where('name', $name);
            $genre = $genre->search();
            
            if(!$genre) {
                $genre = new Genre();
                $genre->name = $name;
                $genre->save();
            }
        }
    }
    
    function afterAction() {
        
    }
}
