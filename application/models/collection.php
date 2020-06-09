<?php

class Collection extends BaseModel {
  public $hasOne = array('User' => 'User');
  public $hasManyAndBelongsToMany = array('Film' => 'Film');
}