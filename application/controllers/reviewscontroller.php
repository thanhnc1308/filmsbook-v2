<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reviewscontroller
 *
 * @author lamnt
 */
class ReviewsController extends BaseController {
    function beforeAction() {
        
    }
    
    function index() {
        
    }
    
    function view() {
        
    }
    
    function create($film_id) {
        $this->set('film_id', $film_id);
    }
    
    function store($film_id) {
        // todo: validate film_id has been insert
        if(isset($_POST['user_id']) && isset($_POST['content'])) {
            $user_id = $_POST['user_id'];
            $content = $_POST['content'];
            $moviedb_id = $_POST['moviedb_id'];
            
            $review = new Review();
            $review->user_id = $user_id;
            $review->film_id = $film_id;
            $review->content = $content;
            $review->moviedb_id = $moviedb_id;
            $review->save();
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
