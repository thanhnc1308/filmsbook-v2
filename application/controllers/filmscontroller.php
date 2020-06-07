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
        if(isset($_POST['name']) && isset($_POST['description'])) {
            $name = $_POST['name'];
            $description = $_POST['name'];
            
            $film = new Film();
            $film->name = $name;
            $film->description = $description;
            $film->save();
            
            $this->set('film', $film);
        }
    }
    
    function afterAction() {
        
    }
}