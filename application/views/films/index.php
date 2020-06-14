<div class="content bg-body pt-4">
    <div class="container">
        <div class="content-body d-flex mt-4">
            <?php
                foreach($films as $film) {
                    $title = $film['Film']['title'];
                    $poster_path = $film['Film']['avatar'];
                    $id = $film['Film']['id'];
                    
                    $film_thumbnail = new FilmThumbnail($id, $title, $poster_path);
                    $film_thumbnail->render($html);
                }
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->
<?php
$html->includeCss('films');
?>