<div class="content bg-body pt-4">
    <div class="container">
        <div class="content-body mt-4">
            <?php
                foreach($genres as $genre) {
                    $name = $genre['Genre']['name'];
                    $id = $genre['Genre']['id'];
                    $genre_thumbnail = new GenreThumbnail($id, $name);
                    $genre_thumbnail->render($html);
                    echo "<br>";
                }
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->