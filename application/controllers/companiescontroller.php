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
        if(isset($_POST['name'])) {
            $name = $_POST['name'];
            $company = new Company();
            $company->where('name', $name);
            $company = $company->search();
            
            if($company == null) {
                $name = $_POST['name'];
            
                $company = new Company();
                $company->name = $name;
                $company->save();
            }
            
        }
    }
    
    public function afterAction() {
        
    }
}
