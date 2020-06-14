<?php

class CollectionsController extends BaseController
{
  function beforeAction()
  {
    include(dirname(__DIR__) . '/../library/checklogin.php');
  }

  function index()
  {
    $user_id = $this->getUserId();
    $collections = [];
    $collections_films = $this->Collection->custom(
      "SELECT collections.*, films.avatar FROM collections 
      LEFT JOIN collections_films ON collections.id = collections_films.collection_id
      LEFT JOIN films ON collections_films.film_id = films.id
      WHERE user_id = $user_id"
    );
    foreach ($collections_films as $collection_film) {
      $collection_id = $collection_film['Collection']['id'];
      $collections[$collection_id]['Collection'] = $collection_film['Collection'];
      $collections[$collection_id]['Film'][] = $collection_film['Film'];
      $collections[$collection_id]['Owner']['id'] = $this->getUserId();
      $collections[$collection_id]['Owner']['name'] = $this->getUserName();
    }

    $this->set('collections', $collections);
    $this->set('username', $this->getUserName());
  }

  function add()
  {
    $user_id = $this->getUserId();
    $this->doNotRenderHeader = 1;
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['films']) && !empty($user_id)) {
      $name = $this->Collection->escapeSecureSQL($_POST['name']);
      $description = $this->Collection->escapeSecureSQL($_POST['description']);
      $film_ids = json_decode($_POST['films']);

      try {
        $collection = new Collection();
        $collection->name = $name;
        $collection->description = $description;
        $collection->user_id = $user_id;

        $collection_id = $collection->save();

        foreach ($film_ids as $film_id) {
          $collection_film = new Collections_film();
          $collection_film->collection_id = $collection_id;
          $collection_film->film_id = $film_id;
          $collection_film->save();
        }
        echo $collection_id;
      } catch (Exception $e) {
        echo var_dump($e);
      }
    }
  }

  function update($id)
  {
    $this->Collection->id = $id;
    $this->Collection->showHasOne();
    $this->Collection->showHasManyAndBelongsToMany();
    $collection = $this->Collection->search();
    if ($collection['Collection']['user_id'] == $this->getUserId()) {
      $this->set('collection', $collection);
    }
  }

  function edit()
  {
    $this->doNotRenderHeader = 1;
    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['description']) && isset($_POST['films']) && isset($_POST['collection_id'])) {
      $name = $this->Collection->escapeSecureSQL($_POST['name']);
      $description = $this->Collection->escapeSecureSQL($_POST['description']);
      $film_ids = json_decode($_POST['films']);
      $collection_id = $this->Collection->escapeSecureSQL($_POST['collection_id']);

      $this->Collection->id = $collection_id;
      $this->Collection->showHasOne();
      $this->Collection->showHasManyAndBelongsToMany();
      $result = $this->Collection->search();
      $old_film_ids = array_map(function ($item) {
        return $item['Film']['id'];
      }, $result['Film']);

      if ($result && $result['Collection']['user_id'] == $this->getUserId()) {
        $collection = $this->loadFields();
        $collection->id = $collection_id;
        $collection->save();

        $delete_films = array_filter($old_film_ids, function ($item) use ($film_ids) {
          return !in_array($item, $film_ids);
        });

        $added_films = array_filter($film_ids, function ($item) use ($old_film_ids) {
          return !in_array($item, $old_film_ids);
        });

        if (count($delete_films) > 0) {
          $delete_query_items = join(",", $delete_films);
          $this->Collection->custom("
          DELETE FROM collections_films 
          WHERE collection_id = $collection_id 
          AND film_id IN ($delete_query_items)
          ");
        }

        foreach ($added_films as $film_id) {
          $collection_film = new Collections_film();
          $collection_film->collection_id = $collection_id;
          $collection_film->film_id = $film_id;
          $collection_film_id = $collection_film->save();
        }
      } else {
        echo "Only owner can edit";
      }
    } else {
      echo "Bad request";
    }
  }

  function delete()
  {
    $this->doNotRenderHeader = 1;
    if (isset($_POST['id'])) {
      $collection_id = $this->Collection->escapeSecureSQL($_POST['id']);
      $this->Collection->id = $collection_id;
      $this->Collection->showHasOne();
      $this->Collection->showHasManyAndBelongsToMany();
      $result = $this->Collection->search();
      echo var_dump($result);
      if ($result && $result['Collection']['user_id'] == $this->getUserId()) {
        $this->Collection->custom("
          DELETE FROM collections_films 
          WHERE collection_id = $collection_id
          ");
        $this->Collection->custom("
          DELETE FROM collections 
          WHERE id = $collection_id
          ");
      } else {
        echo "Not owner";
      }
    } else {
      echo "Error";
    }
  }

  function view($id)
  {
    $this->Collection->id = $id;
    $this->Collection->showHasOne();
    $this->Collection->showHasManyAndBelongsToMany();
    $collection = $this->Collection->search();
    $collection['Owner']['id'] = $this->getUserId();
    $collection['Owner']['name'] = $this->getUserName();
    $this->set('collection', $collection);
  }



  function afterAction()
  {
  }
}
