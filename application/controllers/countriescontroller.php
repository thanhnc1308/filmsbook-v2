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
    
    function create() {
        
    }
    
    function store() {
        if(isset($_POST['moviedb_id']) && isset($_POST['name'])) {
            // check if moviedb_id of the country exists
            $moviedb_id = $_POST['moviedb_id'];
            
            $country = new Country();
            $country->where('moviedb_id', $moviedb_id);
            $country = $country->search();
            if($country == null) {
                $name = $_POST['name'];
            
                $country = new Country();
                $country->moviedb_id = $moviedb_id;
                $country->name = $name;
                $country->save();
            }
        }
    }
    
    function test() {
        $moviedb_id = 730;
        $country = new Country();
        $country->where('moviedb_id', $moviedb_id);
        $country = $country->search();
        if($country == null) {
            echo "country is null";
        }
    }
    
    function afterAction() {
        
    }
}
