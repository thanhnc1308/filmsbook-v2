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
        
    }
    
    function store() {
        if(isset($_POST['name'])) {
            $actor = new Actor();
            $actor->birthday = $_POST['birthday'];
            $actor->deathday = $_POST['deathday'];
            $actor->name = $_POST['name'];
            $actor->gender = $_POST['gender'];
            $actor->biography = $_POST['biography'];
            $actor->popularity = $_POST['popularity'];
            $actor->place_of_birth = $_POST['place_of_birth'];
            $actor->profile_path = $_POST['profile_path'];
            
            $actor->save();
        }
    }
    
    function edit($actor_id) {
        if($actor_id) {
            if(is_numeric($actor_id)) {
                var_dump("hello");
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
                    $this->set('actor_id', $actor_id);
                } else {
                    
                }
            } else {
                
            }
        } else {
            
        }
    }
    
    function delete() {
        
    }
    
    function afterAction() {
        
    }
    
    function test() {
        var_dump($this->Actor->getDescribe());
    }
    
//    protected function loadFields() {
//        $describe = $this->Actor->getDescribe();
//        $actor = new Actor();
//        foreach($describe as $field) {
//            if(isset($_POST[$field])) {
//                $actor->$field = $actor->escapeSecureSQL($_POST[$field]);
//            }
//        }
//        return $actor;
//    }
}