<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of thumbnail
 *
 * @author lamnt
 */
class FilmThumbnail {
    protected $avatar;
    protected $title;
    protected $id;
    
    function __construct($id, $title, $avatar) {
        $this->id = $id;
        $this->title = $title;
        $this->avatar = $avatar;
    }
    
    function render_small($html) {
        echo "<div>";
        echo "<a href=\"";
        echo $html->getHref('films/view/' . $this->id);
        echo "\">" . $this->title . "</a>";
        echo "</div>";
    }
    
    function render($html) {
        echo "<div>";
        echo "<div><img src=\"" . $this->avatar . "\" width=\"154\"></div>";
        echo "<div><a href=\"" . $html->getHref('films/view/') . $this->id . "\">" . $this->title . "</a></div>";
        echo "</div>";
    }
}

