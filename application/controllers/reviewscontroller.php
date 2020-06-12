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
    
    function view($id) {
        // check if $id exists
        $this->Review->id = $id;
        $this->Review->showHasOne();
        $review = $this->Review->search();
        if($review) {
            $this->set('status', 1);
            $this->set('review', $review);
        } else {
            $this->set('status', 0);
        }
    }
    
    function create($film_id) {
        $this->set('film_id', $film_id);
    }
    
    function store($film_id) {
        if($film_id) {
            // validate film id
            $film = new Film();
            $film->id = $film_id;
            $film = $film->search();
            
            if($film) {
                if(isset($_POST['user_id']) && isset($_POST['content'])) {
                    $user_id = $_POST['user_id'];
                    $content = $_POST['content'];

                    $review = new Review();
                    $review->user_id = $user_id;
                    $review->film_id = $film_id;
                    $review->content = $content;
                    $review->save();
                }
            } else {
                // redirect to error page
            }
        } else {
            // redirect to error page
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
