<?php
class FilmsController extends BaseController {
    function beforeAction() {
        
    }
    
    function view($id) {
        // search for this film
        $this->Film->id = $id;
        $this->Film->showHasManyAndBelongsToMany();
        $this->Film->showHasMany();
        $film = $this->Film->search();
        if($film == null) {
            $this->set('status', 0);
        } else {
            $this->set('status', 1);
            
            // get all reviews coming with the film
            $reviews = $film['Review'];
            foreach($reviews as &$review) {
                // get review's author name
                $user_id = $review['Review']['user_id'];
                $user = new User();
                $user->id = $user_id;
                $user = $user->search();
                $username = $user['User']['name'];
                
                $review['Review']['username'] = $username;
            }
            
            $this->set('film', $film);
            $this->set('reviews', $reviews);
        }
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
    
    function edit($id) {
        $film = new Film();
        $film->id = $id;
        $film->showHasMany();
        $film->showHasManyAndBelongsToMany();
        $film = $film->search();
        
        $genres = new Genre();
        $genres = $genres->search();
        
        $countries = new Country();
        $countries = $countries->search();
        
        $companies = new Company();
        $companies = $companies->search();
        
        $this->set('film', $film);
        $this->set('genres', $genres);
        $this->set('companies', $companies);
        $this->set('countries', $countries);
    }
    
    function update($id) {
        // get the movie from db
        $film = new Film();
        $film->id = $id;
        $film = $film->search();
        
//        if movie exists then update
        if($film) {
            $film = new Film();
            $film->id = $id;
            
            // update all the fields
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
            
            // update all relationships
            // remove all old relationships;
            // films_genres
            $films_genres = new Films_genre();
            $films_genres->where('film_id', $id);
            $films_genres = $films_genres->search();
             
            foreach($films_genres as $film_genre) {
                $fg_id = $film_genre['Films_genre']['id'];
                $fg = new Films_genre();
                $fg->id = $fg_id;
                $fg->delete();                
            }
            
            // companies_films
            $companies_films = new Companies_film();
            $companies_films->where('film_id', $id);
            $companies_films = $companies_films->search();
            
            foreach($companies_films as $company_film) {
                $cf_id = $company_film['Companies_film']['id'];
                $cf = new Companies_film();
                $cf->id = $cf_id;
                $cf->delete();
            }
            
            // countries_films;
            $countries_films = new Countries_film();
            $countries_films->where('film_id', $id);
            $countries_films = $countries_films->search();
            
            foreach($countries_films as $country_film) {
                $cf_id = $country_film['Countries_film']['id'];
                $cf = new Countries_film();
                $cf->id = $cf_id;
                $cf->delete();
            }
            
            // add new relationships;
            // Save Genres
            foreach($_POST['genres'] as $genre_input) {
                $genre = new Genre();
                $genre->id = $genre_input;
                $genre = $genre->search();
                $genre_id = $genre['Genre']['id'];
                
                // save genre id along with film id in films_genres table
                // how to represent an intermedia table with model?
                $film_genre = new Films_genre();
                $film_genre->film_id = $id;
                $film_genre->genre_id = $genre_id;
                $film_genre->save();
            }
            
            // Save Companies 
            foreach($_POST['companies'] as $company_input) {
                $company = new Company();
                $company->id = $company_input;
                $company = $company->search();
                $company_id = $company['Company']['id'];
                
                $company_film = new Companies_film();
                $company_film->film_id = $id;
                $company_film->company_id = $company_id;
                $company_film->save();
            }
            
            // Save Countries
            foreach($_POST['countries'] as $country_input) {
                $country = new Country();
                $country->id = $country_input;
                $country = $country->search();
                $country_id = $country['Country']['id'];
                
                $countries_film = new Countries_film();
                $countries_film->country_id = $country_id;
                $countries_film->film_id = $id;
                $countries_film->save();
            }
            
            // set success status
            $this->set('status', 1);
            $this->set('film_id', $id);
        } else {
            // output film doesn't exist
            // in update view
            $this->set('status', 0);
            $this->set('film_id', $id);
        }
            
//        if no then output error
        
        
        
    }
    
    function test() {
        $this->Film->where('moviedb_id', 443791);
        $film = $this->Film->search();
        var_dump($film);
    }
    
    function afterAction() {
        
    }
}