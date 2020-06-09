<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompaniesController
 *
 * @author lamnt
 */
class CompaniesController extends BaseController {
    public function beforeAction() {
        
    }
    
    public function index() {
        $compaies = $this->Company->search();
        $this->set('companies', $compaies);
    }
    
    public function create() {
        
    }
    
    public function store() {
        if(isset($_POST['moviedb_id']) && isset($_POST['name'])) {
            $moviedb_id = $_POST['moviedb_id'];
            $company = new Company();
            $company->where('moviedb_id', $moviedb_id);
            $company = $company->search();
            
            if($company == null) {
                $name = $_POST['name'];
            
                $company = new Company();
                $company->moviedb_id = $moviedb_id;
                $company->name = $name;
                $company->save();
            }
            
        }
    }
    
    public function afterAction() {
        
    }
}
