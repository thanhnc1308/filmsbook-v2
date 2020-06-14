<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CompanyThumbnail {
    protected $name;
    protected $id;
    
    function __construct($id, $name) {
        $this->name = $name;
        $this->id = $id;
    }
    
    function render($html) {
        echo "<div>";
        echo "<a class=\"film-link\" href=\"";
        echo $html->getHref('companies/view/' . $this->id);
        echo "\">" . $this->name . "</a>";
        echo "</div>";
    }
}