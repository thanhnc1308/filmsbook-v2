<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of toolbar
 *
 * @author lamnt
 */
class ToolBar {
    protected $actions;
    protected $controller;
    protected $id;
    
    function __construct($controller, $id) {
        $this->id = $id;
        $this->controller = $controller;        
        $this->actions = [
            'edit' => $controller . "/edit/" . $id,
            'delete' => $controller . "/delete"
        ];
    }
    
    function render($html) {
        $delete_link = $html->getHref($this->controller . '/delete');
        echo "<form method=\"post\" action=\"$delete_link\">";
        echo "<div class=\"tab-bar\">";
        echo "<div class=\"row vertical-center mt-2 pt-2 pb-2\">";
        
        foreach($this->actions as $name => $link) {
            $link = $html->getHref($link);
            $name = ucfirst($name);
            
            if($name == 'Delete') {
                echo "<input type=\"hidden\" name=\"id\" value=\"$this->id\">";
                echo "<input type=\"submit\" value=\"$name\" class=\"tab-item ml-3 pt-3 pb-3 pl-2 pr-2 round danger btn no-underline\">";
            } else {
                echo "<a ";
                echo "href=\"$link\" class=\"tab-item ml-3 pt-3 pb-3 pl-2 pr-2 btn no-underline warning\"";
                echo ">$name</a>";
            }            
        }
            
        echo "</div>";
        echo "</div>";
        echo "</form>";
    }
}
