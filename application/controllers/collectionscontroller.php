<?php

class CollectionsController extends BaseController{
  function beforeAction(){

  }
  
  function index(){
    
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