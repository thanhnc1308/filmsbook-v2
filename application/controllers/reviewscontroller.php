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
        $this->Review->showHasOne();
        $reviews = $this->Review->search();
        
        $this->set('reviews', $reviews);
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
                if(isset($_POST['content'])) {
                    $user_id = $this->getUserId();
                    $content = $_POST['content'];

                    $review = new Review();
                    $review->user_id = $user_id;
                    $review->film_id = $film_id;
                    $review->content = $content;
                    $review->save();
                }
                $this->set('film_id', $film_id);
            } else {
                // redirect to error page
            }
        } else {
            // redirect to error page
        }
    }
    
    function edit($id) {
        // check if id exists
        if($id) {
            $this->Review->id = $id;
            $this->Review->showHasOne();
            $review = $this->Review->search();
            if($review) {
                $this->set('status', 1);
                $this->set('review', $review);
            } else {
                // todo: redirect error page
                $this->set('status', 0);
            }
        } else {
            // todo: redirect error page
        }
    }
    
    function update($id) {
        if($id) {
            $this->Review->id = $id;
            $review = $this->Review->search();
            if($review) {
                $updated_content = $this->cleanInput($_POST['content']);
                
                $updated_review = new Review();
                $updated_review->id = $id;
                $updated_review->user_id = $review['Review']['user_id'];
                $updated_review->film_id = $review['Review']['film_id'];
                $updated_review->content = $updated_content;                
                
                $updated_review->save();
            } else {
                // todo: redirect error page
            }
        } else {
            // todo: redirect error page
        }
        $this->set('id', $id);
    }
    
    function delete() {
        if(isset($_POST['id'])) {
            $review_id = $this->cleanInput($_POST['id']);
            // validate if this id exists
            $this->Review->id = $review_id;
            $result = $this->Review->search();
            // delete
            if($result) {
                $review = new Review();
                $review->id = $review_id;
                $review->delete();
            }
        }
    }
    
    function afterAction() {
        
    }
}
