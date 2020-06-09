<?php

class CollectionsController extends BaseController{
  function beforeAction(){

  }
  
  function index($user_id=null){
    $user_id = 2;
    $collections = [];
    $collections_films = $this->Collection->custom(
    "SELECT collections.*, films.avatar FROM collections 
      INNER JOIN collections_films ON collections.id = collections_films.collection_id
      INNER JOIN films ON collections_films.film_id = films.id
      WHERE user_id = $user_id");
    foreach($collections_films as $collection_film){
      $collection_id = $collection_film['Collection']['id'];
      $collections[$collection_id]['Collection'] = $collection_film['Collection'];
      $collections[$collection_id]['Film'][] = $collection_film['Film']; 
    }
    $this->set('collections', $collections);
  }

  function create(){

  }

  function update($id){

  }

  function view($id){
    $this->Collection->id = $id;
    $this->Collection->showHasOne();
    $this->Collection->showHasManyAndBelongsToMany();
    $collection = $this->Collection->search();
    $this->set('collection', $collection);
  }

  function delete($id){

  }

  function afterAction(){

  }
}