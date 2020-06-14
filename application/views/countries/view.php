<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!$status)
    header("Location: " . $html->getHref('companies'));

$films = $country['Film'];
?>

<div class="content bg-body pt-4">
    <!-- tab bar-->
    <?php
    $tabbar = new TabBar('countries');
    $tabbar->render($html);
    ?>
    
    <div class="container">
        <h1>
            <?php
                echo "<h1>" . $country['Country']['name'] . "</h1>";
            ?>
        </h1>
        <div class="content-body d-flex mt-4">
            <?php
            foreach($films as $film) {
                $id = $film['Film']['id'];
                $title = $film['Film']['title'];
                $avatar = $film['Film']['avatar'];

                $film_thumbnail = new FilmThumbnail($id, $title, $avatar);
                $film_thumbnail->render($html);
            }
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>