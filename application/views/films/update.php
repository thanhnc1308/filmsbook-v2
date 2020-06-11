<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    if($status == 0) {
        echo "<h1>The movie you want to edit doesn't exist!</h1>";
    } else {
        header("Location: " . BASE_PATH . '/films/view/' . $film_id);
    }
