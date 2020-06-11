<div class="content bg-body pt-4">
    <div class="container">
        <div class="content-body d-flex mt-4">
            <?php
                foreach($films as $film) {
                    $title = $film['Film']['title'];
                    echo "<h1>$title</h1>";
                    
                    $poster_path = $film['Film']['avatar'];
                    echo "<img src=\"$poster_path\" width=\"154\">";
                    
                    foreach($film['Genre'] as $genre) {
                        echo $genre['Genre']['name'] . " ";
                    }
                    
                    echo "<hr>";
                    echo "<br>";
                }
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->