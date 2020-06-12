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
        echo "<div>";
        echo "<div><img src=\"" . $this->profile_path . "\" width=\"154\"></div>";
        echo "<div><a href=\"" . $html->getHref('actors/view/') . $this->id . "\">" . $this->name . "</a></div>";
        echo "</div>";
    }
}

