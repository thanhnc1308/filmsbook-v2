<?php

class Collection extends Model {
  public $hasOne = array('User' => 'User');
  public $hasManyAndBelongsToMany = array('Film' => 'Film');
}