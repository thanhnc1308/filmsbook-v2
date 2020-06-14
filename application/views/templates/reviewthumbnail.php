<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReviewThumbnail
 *
 * @author lamnt
 */
class ReviewThumbnail {
    protected $avatar;
    protected $author;
    protected $id;
    
    function __construct($id, $author, $avatar) {
        $this->id = $id;
        $this->author = $author;
        $this->avatar = $avatar;
    }
    
    function render_small($html) {
        
    }
    
    function render($html) {
        echo "<div class=\"film-item mr-4\">";
        echo "<a class=\"film-link\" href=\"" . $html->getHref('reviews/view/' . $this->id) . "\">";
        echo "<img src=\"" . $this->avatar . "\" class=\"rounded\" width=\"125\" height=\"187\" title=\"" . $this->author . "\">";
        echo "<div class=\"film-title\">";
        echo "<strong>" . $this->author . "</strong>";
        echo "</div>";
        echo "</a>";
        echo "</div>";
    }
    
    function render_big($html) {
        
    }
}