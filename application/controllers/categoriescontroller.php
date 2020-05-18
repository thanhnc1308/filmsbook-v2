<?php

class CategoriesController extends BaseController {

    function beforeAction() {
        
    }

    function view($categoryId = null) {
        $this->Category->where('parent_id', $categoryId);
        $this->Category->showHasOne();
        $this->Category->showHasMany();
        $subcategories = $this->Category->search();

        $this->Category->id = $categoryId;
        $this->Category->showHasOne();
        $this->Category->showHasMany();
        $category = $this->Category->search();

        $this->set('subcategories', $subcategories);
        $this->set('category', $category);
    }

    function index() {
        $this->Category->orderBy('name', 'ASC');
        $this->Category->showHasOne();
        $this->Category->showHasMany();
        $this->Category->where('parent_id', '0');
        $categories = $this->Category->search();
        $this->set('categories', $categories);
    }

    function afterAction() {
        
    }

    /**
     * If $this->Category->id = null; 
     * then it will create a new record in the categories table.
     */
    function new() {
        $this->Category->id = $_POST['id'];
        $this->Category->name = $_POST['name'];
        $this->Category->save();
    }

    function delete($categoryId) {
        $this->Category->id = $categoryId;
        $this->Category->delete();
    }

}
