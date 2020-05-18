<?php

class Product extends BaseModel {

    var $hasOne = array('Category' => 'Category');
    var $hasManyAndBelongsToMany = array('Tag' => 'Tag');

}
