<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tabbar
 *
 * @author lamnt
 */
class TabBar {
    protected $active;
    protected $controllers;
    
    function __construct($active) {
        $this->controllers = [
            'films',
            'actors',
            'genres',
            'companies',
            'countries',
            'reviews'
        ];
        $this->active = $active;
    }
    
    function render($html) {
        echo "<div class=\"container tab-bar\">";
        echo "<div class=\"row vertical-center\">";
        
        foreach($this->controllers as $controller) {
            $link = $html->getHref($controller);
            $name = ucfirst($controller);
            
            echo "<a ";
            echo "href=\"$link\" class=\"tab-item ml-3 pt-3 pb-3 pl-2 pr-2 no-underline";
            if($controller == $this->active)
                echo " active";
            echo "\"";
            echo ">$name</a>";
        }
            
        echo "</div>";
        echo "</div>";
    }
}
