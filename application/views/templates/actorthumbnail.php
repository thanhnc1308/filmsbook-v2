<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ActorThumbnail {
    protected $name;
    protected $id;
    protected $profile_path;
    
    function __construct($id, $name, $profile_path) {
        $this->name = $name;
        $this->id = $id;
        $this->profile_path = $profile_path;
    }
    
    function render_small($html) {
        echo "<div>";
        echo "<a href=\"";
        echo $html->getHref('actors/view/' . $this->id);
        echo "\">" . $this->name . "</a>";
        echo "</div>";
    }
    
    function render($html) {
        echo "<div class=\"film-item mr-4\">";
        echo "<a class=\"film-link\" href=\"" . $html->getHref('actors/view/' . $this->id) . "\">";
        echo "<img src=\"" . $this->profile_path . "\" class=\"rounded\" width=\"125\" height=\"187\" title=\"" . $this->name . "\">";
        echo "<div class=\"film-title\">";
        echo $this->name;
        echo "</div>";
        echo "</a>";
        echo "</div>";
    }
}

