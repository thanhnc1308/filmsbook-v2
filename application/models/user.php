<?php

class User extends BaseModel {
  public $hasMany = array('Collection' => 'Collection');
}