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
                $username = $user['User']['username'];
                
                $review['Review']['username'] = $username;
            }
            
            $this->set('film', $film);
            $this->set('reviews', $reviews);
        }
    }
    
    function index() {
        $films = $this->Film->search();
        $this->set('films', $films);
    }
    
    function create() {
        
        session_start();
        $role = $_SESSION["role"];

        if($role!='admin'){
            $this->render = 0;
            header("Location: http://localhost/filmsbook-v2/login");
            exit();
        }

        $genres = new Genre();
        $genres = $genres->search();
        $this->set('genres', $genres);
        
        $companies = new Company();
        $companies = $companies->search();
        $this->set('companies', $companies);
        
        $countries = new Country();
        $countries = $countries->search();
        $this->set('countries', $countries);
        
        $actors = new Actor();
        $actors = $actors->search();
        $this->set('actors', $actors);
    }
    
    function store() {
        if (isset($_POST['title']) 
            && isset($_POST['description'])
            && isset($_POST['release_date'])
            && isset($_POST['popularity'])
            && isset($_POST['length'])
        ) {
            $film = new Film();
            $film->title = $_POST['title'];
            $film->description = $_POST['description'];
            $film->release_date = $_POST['release_date'];
            $film->popularity = $_POST['popularity'];
            $film->length = $_POST['length'];
            
            $film->budget = $_POST['budget'];
            $film->original_language = $_POST['original_language'];
            $film->avatar = $_POST['avatar'];
            $film->trailer = $_POST['trailer'];
            $film->revenue = $_POST['revenue'];
            $film->vote_average = $_POST['vote_average'];
            $film->vote_count = $_POST['vote_count'];
            
            $film_id = $film->save();
            
            // Save Genres
            if(isset($_POST['genres'])) {
                foreach($_POST['genres'] as $genre_input) {
                    $genre = new Genre();
                    $genre->id = $genre_input;
                    $genre = $genre->search();
                    $genre_id = $genre['Genre']['id'];

                    // save genre id along with film id in films_genres table
                    $film_genre = new Films_genre();
                    $film_genre->film_id = $film_id;
                    $film_genre->genre_id = $genre_id;
                    $film_genre->save();
                }
            }
            
            // Companies 
            if(isset($_POST['companies'])) {
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
            }
            
            // Countries
            if(isset($_POST['countries'])) {
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
            }
            
            // Casts
            $actors = $_POST['actors'];
            $characters = $_POST['characters'];
            $count = count($actors);
            
            for($i = 0; $i < $count; $i++) {
                $actor_id = $actors[$i];
                $character_name = $characters[$i];
                
                $cast = new Actors_film();
                $cast->film_id = $film_id;
                $cast->actor_id = $actor_id;
                $cast->character_name = $character_name;
                $cast->save();
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
        
        $actors = new Actor();
        $actors = $actors->search();
        
        $this->set('film', $film);
        $this->set('genres', $genres);
        $this->set('companies', $companies);
        $this->set('countries', $countries);
        $this->set('actors', $actors);
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
            $film->description = $_POST['description'];
            $film->release_date = $_POST['release_date'];
            $film->popularity = $_POST['popularity'];
            $film->length = $_POST['length'];

            $film->budget = $_POST['budget'];
            $film->original_language = $_POST['original_language'];
            $film->avatar = $_POST['avatar'];
            $film->trailer = $_POST['trailer'];
            $film->revenue = $_POST['revenue'];
            $film->vote_average = $_POST['vote_average'];
            $film->vote_count = $_POST['vote_count'];
            
            $film->save();
            
            // update many to many relationships
            // by removing all old relationships;
            // and add new ralationships
            
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
            
            // actors_film;
            $actors_films = new Actors_film();
            $actors_films->where('film_id', $id);
            $actors_films = $actors_films->search();
            
            foreach($actors_films as $actor_film) {
                $af_id = $actor_film['Actors_film']['id'];
                $af = new Actors_film();
                $af->id = $af_id;
                $af->delete();
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
            
            // Save Casts
            $actors = $_POST['actors'];
            $characters = $_POST['characters'];
            $count = count($actors);
            
            for($i = 0; $i < $count; $i++) {
                $actor_id = $actors[$i];
                $character_name = $characters[$i];
                
                $cast = new Actors_film();
                $cast->film_id = $id;
                $cast->actor_id = $actor_id;
                $cast->character_name = $character_name;
                $cast->save();
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
    
    function delete() {
        if(isset($_POST['id'])) {
            // check if movie exists
            $film_id = $_POST['id'];
            $this->Film->id = $film_id;
            $film = $this->Film->search();
            var_dump($film);
            if($film) {                
                // films_genres
                $films_genres = new Films_genre();
                $films_genres->where('film_id', $film_id);
                $films_genres = $films_genres->search();
                foreach($films_genres as $fg) {
                    $fg_id = $fg['Films_genre']['id'];
                    $fg = new Films_genre();
                    $fg->id = $fg_id;
                    $fg->delete();
                }
                
                // companies_films
                $companies_films = new Companies_film();
                $companies_films->where('film_id', $film_id);
                $companies_films = $companies_films->search();
                foreach($companies_films as $cf) {
                    $cf_id = $cf['Companies_film']['id'];
                    $cf = new Companies_film();
                    $cf->id = $cf_id;
                    $cf->delete();
                }
                
                // countries_films
                $countries_films = new Countries_film();
                $countries_films->where('film_id', $film_id);
                $countries_films = $countries_films->search();
                foreach($countries_films as $cf) {
                    $cf_id = $cf['Countries_film']['id'];
                    $cf = new Countries_film();
                    $cf->id = $cf_id;
                    $cf->delete();
                }
                
                // actors_films
                $actors_films = new Actors_film();
                $actors_films->where('film_id', $film_id);
                $actors_films = $actors_films->search();
                foreach($actors_films as $af) {
                    $af_id = $af['Actors_film']['id'];
                    $af = new Actors_film();
                    $af->id = $af_id;
                    $af->delete();
                }
                
                // reviews
                $reviews = new Review();
                $reviews->where('film_id', $film_id);
                $reviews = $reviews->search();
                foreach($reviews as $review) {
                    $rv_id = $review['Review']['id'];
                    $rv = new Review();
                    $rv->id = $rv_id;
                    $rv->delete();
                }
                
                // delete movie
                $film_id = $film['Film']['id'];
                $film = new Film();
                $film->id = $film_id;
                $film->delete();
            } else {

            }
            
        } else {

        }
    }
    
    function afterAction() {
        
    }
}