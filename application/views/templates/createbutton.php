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
class CreateButton
{
    protected $controller;

    function __construct($controller)
    {
        $this->controller = $controller;
    }

    function render($html)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['role'])) {
            $role = $_SESSION['role'];
            if ($role == 'admin') {
                $link = $html->getHref($this->controller . '/create');
                echo "<div class=\"create-bar\">";
                echo "<a href=\"$link\" class=\"create-btn no-underline\">Add new Item</a>";
                echo "</div>";
            }
        }
    }
}
