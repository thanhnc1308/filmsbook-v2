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
    
    function view($id) {
        // check if $id exists
        $this->Actor->id = $id;
        $this->Actor->showHasManyAndBelongsToMany();
        $actor = $this->Actor->search();
        if($actor) {
            $this->set('status', 1);
            $this->set('actor', $actor);
        } else {
            $this->set('status', 0);
        }
    }
    
    function create() {
        include(dirname(__DIR__).'/../library/checkadminauthor.php');
    }
    
    function store() {

        include(dirname(__DIR__).'/../library/checkadminauthor.php');

        if(isset($_POST['name']) && !empty($_POST['name'])) {
            $actor = $this->loadFields();            
            $actor->save();
        }
    }
    
    function edit($actor_id) {

        include(dirname(__DIR__).'/../library/checkadminauthor.php');

        if($actor_id) {
            if(is_numeric($actor_id)) {
                $actor = new Actor();
                $actor->id= $actor_id;
                $actor = $actor->search();
                
                if($actor) {
                    $this->set('actor', $actor);
                    $this->set('status', 1);
                } else {
                    $this->set('status', 0);
                }                
            } else {
                $this->set('status', 0);
            }
        } else {
            $this->set('status', 0);
        }
    }
    
    function update($actor_id) {

        include(dirname(__DIR__).'/../library/checkadminauthor.php');

        // validate actor_id
        if($actor_id) {
            if(is_numeric($actor_id)) {
                $actor = new Actor();
                $actor->id= $actor_id;
                $result = $actor->search();
                if($result) {
                    $actor = $this->loadFields();
                    $actor->id = $actor_id;
                    $actor->save();
                    var_dump($actor);
                    $this->set('actor_id', $actor_id);
                } else {
                    
                }
            } else {
                
            }
        } else {
            
        }
    }
    
    function delete() {

        include(dirname(__DIR__).'/../library/checkadminauthor.php');

        // validate id exist in post request and id is number
        if(isset($_POST['id']) && is_numeric($_POST['id'])) {
            // validate if this actor            
            $id = $this->Actor->escapeSecureSQL($_POST['id']);
            $actor = new Actor();
            $actor->id = $id;
            $actor = $actor->search();
            var_dump();
            if($actor) {
               // delete all actors_films 
                $actors_films = new Actors_film();
                $actors_films->where('id', $id);
                $results = $actors_films->search();

                foreach($results as $result) {
                    $af = new Actors_film();
                    $af->id = $result['Actors_film']['id'];
                    $af->delete();
                }
                
                $actor = new Actor();
                $actor->id = $id;
                $actor->delete();
            }
        }
    }
    
    function afterAction() {
        
    }
}