<?php

class CollectionsController extends BaseController{
  function beforeAction(){
    include(dirname(__DIR__).'/../library/checklogin.php');
  }
  
  function index(){
    $user_id = $this->getUserId();
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
      $collections[$collection_id]['Owner']['id'] = $this->getUserId();
      $collections[$collection_id]['Owner']['name'] = $this->getUserName();
    }
    $this->set('collections', $collections);
    $this->set('username', $this->getUserName());
  }

  function add(){
    $user_id = $this->getUserId();
    $this->doNotRenderHeader = 1;
    if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['films'])){
      $name = $this->Collection->escapeSecureSQL($_POST['name']);
      $description = $this->Collection->escapeSecureSQL($_POST['description']);
      $film_ids = $this->Collection->escapeSecureSQL(json_decode($_POST['films']));
      
      try{
        $collection = new Collection();
        $collection->name = $name;
        $collection->description = $description;
        $collection->user_id = $user_id;
  
        $collection_id = $collection->save();
  
        foreach($film_ids as $film_id){
          $collection_film = new Collections_film();
          $collection_film->collection_id = $collection_id;
          $collection_film->film_id = $film_id;
          $collection_film->save();
        }
        echo $collection_id;
      } catch(Exception $e){
        echo var_dump($e);
      }
    }
  }

  function update($id){
    $this->Collection->id = $id;
    $this->Collection->showHasOne();
    $this->Collection->showHasManyAndBelongsToMany();
    $collection = $this->Collection->search();
    $this->set('collection', $collection);
  }

  function view($id){
    $this->Collection->id = $id;
    $this->Collection->showHasOne();
    $this->Collection->showHasManyAndBelongsToMany();
    $collection = $this->Collection->search();
    $collection['Owner']['id'] = $this->getUserId();
    $collection['Owner']['name'] = $this->getUserName();
    $this->set('collection', $collection);
  }

  function delete($id){

  }

  function afterAction(){

  }
}