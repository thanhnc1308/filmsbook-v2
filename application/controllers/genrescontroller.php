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
    
    function view($id) {
        // check if $id exists
        $this->Genre->id = $this->cleanInput($id);
        $this->Genre->showHasManyAndBelongsToMany();
        $genre = $this->Genre->search();
        if($genre) {
            $this->set('status', 1);
            $this->set('genre', $genre);
        } else {
            $this->set('status', 0);
        }
    }
    
    function create() {
        include(dirname(__DIR__).'/../library/checkadminauthor.php');
        $this->render = 0;
    }
    
    function store() {  
        
        include(dirname(__DIR__).'/../library/checkadminauthor.php');

        $this->render = 0;
        
        if(isset($_POST['name'])) {
            $name = $this->cleanInput($_POST['name']);
            if(!empty($name)) {
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
    }
    
    function afterAction() {
        
    }
}
