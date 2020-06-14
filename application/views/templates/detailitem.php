<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of detailitem
 *
 * @author lamnt
 */
class DetailItem {
    protected $title;
    protected $value;
    
    function __construct($title, $value) {
        $this->title = $title;
        $this->value = $value;
    }
    
    function render() {
        echo "<div class=\"film-detail-item\">";
        echo "<div class=\"film-detail-title\">";
        echo "<h3>" . $this->title . "</h3>";
        echo "</div>";
        echo "<div class=\"film-detail-content\">";
        echo "<h4>" . $this->value . "</h4>";
        echo "</div>";
        echo "</div>";
    }
}
