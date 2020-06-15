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
class ReviewsController extends BaseController
{

    protected $userId;

    function beforeAction()
    {
    }

    function index()
    {
        $this->Review->showHasOne();
        $reviews = $this->Review->search();

        $this->set('reviews', $reviews);
    }

    function view($id)
    {
        // check if $id exists
        $this->Review->id = $this->cleanInput($id);
        $this->Review->showHasOne();
        $review = $this->Review->search();
        if ($review) {
            $this->set('status', 1);
            $this->set('review', $review);
        } else {
            $this->set('status', 0);
        }
    }

    function create($film_id)
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $role = $this->getUserRole();

        if (!$role) {
            include(dirname(__DIR__) . '/../library/checklogin.php');
        }

        $this->set('film_id', $film_id);
    }

    function store($film_id)
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $role = $this->getUserRole();

        if (!$role) {
            $this->set('status', 0);
            include(dirname(__DIR__) . '/../library/checklogin.php');
        } else {
            if ($film_id) {
                // validate film id
                $film = new Film();
                $film->id = $this->cleanInput($film_id);
                $film = $film->search();

                if ($film) {
                    if (isset($_POST['content'])) {
                        $user_id = $this->getUserId();
                        $content = $this->cleanInput($_POST['content']);

                        if(!empty($content)) {
                            $review = new Review();
                            $review->user_id = $user_id;
                            $review->film_id = $film_id;
                            $review->content = $content;
                            $review->save();
                        }
                    }
                } else {
                    // redirect to error page
                }
            } else {
                // redirect to error page
            }
            $this->set('status', 1);
        }
    }

    function edit($id)
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // check if id exists
        if($id) {
            $this->Review->id = $this->cleanInput($id);
            $this->Review->showHasOne();
            $review = $this->Review->search();

            $this->userId = $review['Review']['user_id'];
            if ($review) {

                if (isset($_SESSION['role']) && isset($_SESSION['user_id'])) {
                    $role = $_SESSION['role'];
                    $userSessionId = $_SESSION['user_id'];

                    if ($role == 'admin' || $userSessionId == $this->userId) {
                        $this->set('status', 1);
                        $this->set('review', $review);
                    }
                }
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
            $this->Review->id = $this->cleanInput($id);
            $review = $this->Review->search();

            $this->userId = $review['Review']['user_id'];
            if ($review) {

                if (isset($_SESSION['role']) && isset($_SESSION['user_id'])) {
                    $role = $_SESSION['role'];
                    $userSessionId = $_SESSION['user_id'];

                    if ($role == 'admin' || $userSessionId == $this->userId) {
                        $updated_content = $this->cleanInput($_POST['content']);

                        $updated_review = new Review();
                        $updated_review->id = $id;
                        $updated_review->user_id = $review['Review']['user_id'];
                        $updated_review->film_id = $review['Review']['film_id'];
                        $updated_review->content = $updated_content;
        
                        $updated_review->save();
                    }
                }
            } else {
                // todo: redirect error page
            }
        } else {
            // todo: redirect error page
        }
        $this->set('id', $id);
    }

    function delete()
    {
        if (isset($_POST['id'])) {
            $review_id = $this->cleanInput($_POST['id']);
            // validate if this id exists
            $this->Review->id = $review_id;
            $result = $this->Review->search();

            $this->userId = $result['Review']['user_id'];
            // delete
            if ($result) {

                if (isset($_SESSION['role']) && isset($_SESSION['user_id'])){
                    $review = new Review();
                    $review->id = $review_id;
                    $review->delete();
                }
            }
        }
    }

    function afterAction()
    {
    }
}
