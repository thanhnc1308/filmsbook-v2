<?php
class FilmsController extends BaseController {
    function beforeAction() {
        
    }
    
    function view() {
        
    }
    
    function index() {
        $films = $this->Film->search();
        $this->set('films', $films);
    }
    
    function create() {
        
    }
    
    function store() {
        if (isset($_POST['title']) 
            && isset($_POST['overview'])
            && isset($_POST['release_date'])
            && isset($_POST['popularity'])
            && isset($_POST['runtime'])
        ) {
            $film = new Film();
            $film->title = $_POST['title'];
            $film->overview = $_POST['overview'];
            $film->release_date = $_POST['release_date'];
            $film->popularity = $_POST['popularity'];
            $film->runtime = $_POST['runtime'];
            
            $film->moviedb_id = $_POST['moviedb_id'];
            $film->budget = $_POST['budget'];
            $film->original_language = $_POST['original_language'];
            $film->poster_path = $_POST['poster_path'];
            $film->revenue = $_POST['revenue'];
            $film->vote_average = $_POST['vote_average'];
            $film->vote_count = $_POST['vote_count'];
            
            $film->save();
            
            $this->set('film', $film);
        }
    }
    
    function afterAction() {
        
    }
}