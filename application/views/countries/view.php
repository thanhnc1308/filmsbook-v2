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
    <h1>
        <?php
            echo "<h1>" . $country['Country']['name'] . "</h1>";
        ?>
    </h1>
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