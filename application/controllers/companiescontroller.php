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
    
    public function view($id) {
        // check if $id exists
        $this->Company->id = $this->cleanInput($id);
        $this->Company->showHasManyAndBelongsToMany();
        $company = $this->Company->search();
        if($company) {
            $this->set('status', 1);
            $this->set('company', $company);
        } else {
            $this->set('status', 0);
        }
    }
    
    public function create() {
        include(dirname(__DIR__).'/../library/checkadminauthor.php');
    }
    
    public function store() {
        include(dirname(__DIR__).'/../library/checkadminauthor.php');

        if(isset($_POST['name'])) {
            $name = $this->cleanInput($_POST['name']);
            if(!empty($name)) {
                $company = new Company();
                $company->where('name', $name);
                $company = $company->search();

                if($company == null) {            
                    $company = new Company();
                    $company->name = $name;
                    $company->save();
                }
            }            
        }
    }
    
    public function afterAction() {
        
    }
}
