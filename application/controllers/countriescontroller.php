<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CountriesController
 *
 * @author lamnt
 */
class CountriesController extends BaseController {
    function beforeAction() {
        
    }
    
    function index() {
        $countries = $this->Country->search();
        $this->set('countries', $countries);
    }
    
    public function view($id) {
        // check if $id exists
        $this->Country->id = $this->cleanInput($id);
        $this->Country->showHasManyAndBelongsToMany();
        $country = $this->Country->search();
        if($country) {
            $this->set('status', 1);
            $this->set('country', $country);
        } else {
            $this->set('status', 0);
        }
    }
    
    function create() {
        include(dirname(__DIR__).'/../library/checkadminauthor.php');
    }
    
    function store() {

        include(dirname(__DIR__).'/../library/checkadminauthor.php');

        if(isset($_POST['name'])) {
            // avoid adding duplicate country
            $name = $this->cleanInput($_POST['name']); 
            if(!empty($name)) {
                $country = new Country();
                $country->where('name', $name);
                $country = $country->search();

                if($country == null) {
                    $country = new Country();
                    $country->name = $name;
                    $country->save();
                }
            }
        }
    }
    
    function afterAction() {
        
    }
}
