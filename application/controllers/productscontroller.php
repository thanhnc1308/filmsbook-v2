<?php

class ProductsController extends BaseController {

    function beforeAction() {
        
    }

    function view($id = null) {
        $this->Product->id = $id;
        $this->Product->showHasOne();
        $this->Product->showHasManyAndBelongsToMany();
        $product = $this->Product->search();
        $this->set('product', $product);
    }

    function afterAction() {
        
    }

}
