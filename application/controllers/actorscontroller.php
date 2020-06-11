<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ActorsController
 *
 * @author lamnt
 */
class ActorsController extends BaseController {
    function beforeAction() {
        
    }
    
    function index() {
        $actors = $this->Actor->search();
        $this->set('actors', $actors);
    }
    
    function view() {
        
    }
    
    function create() {
        
    }
    
    function store() {
        if(isset($_POST['name'])) {
            $actor = new Actor();
            $actor->birthday = $_POST['birthday'];
            $actor->deathday = $_POST['deathday'];
            $actor->moviedb_id = $_POST['moviedb_id'];
            $actor->name = $_POST['name'];
            $actor->gender = $_POST['gender'];
            $actor->biography = $_POST['biography'];
            $actor->popularity = $_POST['popularity'];
            $actor->place_of_birth = $_POST['place_of_birth'];
            $actor->profile_path = $_POST['profile_path'];
            
            $actor->save();
        }
    }
    
    function edit() {
        
    }
    
    function update() {
        
    }
    
    function delete() {
        
    }
    
    function afterAction() {
        
    }
}
