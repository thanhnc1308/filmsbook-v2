<?php
    if($status == 0)
        header("Location: " . BASE_PATH . '/films');
?>

<div class="content bg-body pt-4">
    <div class="container">
        <div class="content-body d-flex mt-4">
            <?php
                echo "<h1>Title: " . $film['Film']['title'] . "</h1>";
                $poster_path = $film['Film']['avatar'];
                echo "<img src=\"$poster_path\" width=\"154\">";
                echo "Description: " . $film['Film']['description'] . "<br>";
                echo "Release Date: " . $film['Film']['release_date'] . "<br>";
                echo "Popularity: " . $film['Film']['popularity'] . "<br>";
                echo "Length: " . $film['Film']['length'] . "<br>";

                echo "Budget: " . $film['Film']['budget'] . "<br>";
                echo "Original Language: " . $film['Film']['original_language'] . "<br>";
//                echo "Poster Path: " . $film['Film']['poster_path'];
//                echo "Trailer: " . $film['Film']['trailer'];
                echo "Revenue: " . $film['Film']['revenue'] . "<br>";
                echo "Vote Average: " . $film['Film']['vote_average'] . "<br>";
                echo "Vote Count: " . $film['Film']['vote_count'] . "<br>";

                echo "<br>Genres: ";
                foreach($film['Genre'] as $genre) {
                    echo $genre['Genre']['name'] . " ";
                }
                
                echo "<br>Companies: ";
                foreach($film['Company'] as $company) {
                    echo $company['Company']['name'] . " ";
                }
                
                echo "<br>Countries: ";
                foreach($film['Country'] as $country) {
                    echo $country['Country']['name'] . " ";
                }
                
                echo "<br>Casts:<br>";
                foreach($film['Actor'] as $actor) {
                    echo $actor['Actor']['name'] . " - " . $actor['actors_films']['character_name'] . "<br>";
                }
                
                echo "<br>Reviews:<br>";
                foreach($reviews as $review) {
                    echo $review['Review']['username'] . " - " . $review['Review']['content'];
                }
                
                $trailer = "http://www.youtube.com/embed/" . $film['Film']['trailer'];
                echo "<iframe src=\"$trailer\" width=\"420\" height=\"270\" frameborder=\"0\" allowfullscreen></iframe>";

                echo "<br>";
                echo "<hr>";
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->