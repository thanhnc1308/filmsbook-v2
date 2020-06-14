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
        echo "<div class=\"film-item mr-4\">";
        echo "<a class=\"film-link\" href=\"" . $html->getHref('films/view/' . $this->id) . "\">";
        echo "<img src=\"" . $this->avatar . "\" class=\"rounded\" width=\"125\" height=\"187\" title=\"" . $this->title . "\">";
        echo "<div class=\"film-title\">";
        echo $this->title;
        echo "</div>";
        echo "</a>";
        echo "</div>";
    }
}

