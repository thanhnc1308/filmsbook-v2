<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of createbutton
 *
 * @author lamnt
 */
class CreateButton {
    protected $controller;
    
    function __construct($controller) {
        $this->controller = $controller;
    }
    
    function render($html) {
        $link = $html->getHref($controller . '/create');
        echo "<div>";
        echo "<a href=\"$link\" class=\"create-btn\">Add new Item</a>";
        echo "</div>";
    }
}