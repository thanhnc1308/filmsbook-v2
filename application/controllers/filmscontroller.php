<?php
class FilmsController extends BaseController {
    function beforeAction() {
        
    }
    
    function view() {
        $this->Film->id = 1;
        $this->Film->showHasManyAndBelongsToMany();
        $data = $this->Category->search();
        print_r($data);
    }
    
    function index() {
        $this->Film->showHasManyAndBelongsToMany();
        $films = $this->Film->search();
        $this->set('films', $films);
    }
    
    function create() {
        $genres = new Genre();
        $genres = $genres->search();
        $this->set('genres', $genres);
        
        $companies = new Company();
        $companies = $companies->search();
        $this->set('companies', $companies);
        
        $countries = new Country();
        $countries = $countries->search();
        $this->set('countries', $countries);
    }
    
    function store() {
        if (isset($_POST['title']) 
            && isset($_POST['overview'])
            && isset($_POST['release_date'])
            && isset($_POST['popularity'])
            && isset($_POST['runtime'])
            && isset($_POST['moviedb_id'])
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
            
            // get saved film id
            $this->Film->where('moviedb_id', $_POST['moviedb_id']);
            $film = $this->Film->search();
            $film_id = $film[0]['Film']['id'];
            
            // Save Genres
            foreach($_POST['genres'] as $genre_input) {
                $genre = new Genre();
                $genre->id = $genre_input;
                $genre = $genre->search();
                $genre_id = $genre['Genre']['id'];
                
                // save genre id along with film id in films_genres table
                // how to represent an intermedia table with model?
                $film_genre = new Films_genre();
                $film_genre->film_id = $film_id;
                $film_genre->genre_id = $genre_id;
                $film_genre->save();
            }
            
            // Companies 
            foreach($_POST['companies'] as $company_input) {
                $company = new Company();
                $company->id = $company_input;
                $company = $company->search();
                $company_id = $company['Company']['id'];
                
                $company_film = new Companies_film();
                $company_film->film_id = $film_id;
                $company_film->company_id = $company_id;
                $company_film->save();
            }
            
            // Countries
            foreach($_POST['countries'] as $country_input) {
                $country = new Country();
                $country->id = $country_input;
                $country = $country->search();
                $country_id = $country['Country']['id'];
                
                $countries_film = new Countries_film();
                $countries_film->country_id = $country_id;
                $countries_film->film_id = $film_id;
                $countries_film->save();
            }
            
            $this->set('film', $film);
        }
    }
    
    function test() {
        $this->Film->where('moviedb_id', 443791);
        $film = $this->Film->search();
        var_dump($film);
    }
    
    function afterAction() {
        
    }
}