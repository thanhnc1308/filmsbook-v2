<?php

class Category extends BaseModel {

    var $hasMany = array('Product' => 'Product');
    var $hasOne = array('Parent' => 'Category');

}
