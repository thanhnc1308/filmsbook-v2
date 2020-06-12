<?php
    if($status == 0)
        header("Location: " . $html->getHref('films'));
?>

<div class="content bg-body pt-4">
    <div class="container">
        <div class="content-body mt-4">
            <?php
                $film_id = $film['Film']['id'];
                echo "<h1>Title: " . $film['Film']['title'] . "</h1>";
                $poster_path = $film['Film']['avatar'];
                echo "<img src=\"$poster_path\" width=\"154\">";
                echo "<p>Description: " . $film['Film']['description'] . "</p><br>";
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
                echo "<div>";
                foreach($film['Genre'] as $genre) {
                    $id = $genre['Genre']['id'];
                    $name = $genre['Genre']['name'];
                    $genre_thumbnail = new GenreThumbnail($id, $name);
                    $genre_thumbnail->render($html);
                }
                echo "</div>";
                
                echo "<br>Companies: ";
                foreach($film['Company'] as $company) {
                    $id = $company['Company']['id'];
                    $name = $company['Company']['name'];
                    $company_thumbnail = new CompanyThumbnail($id, $name);
                    $company_thumbnail->render($html);
                }
                
                echo "<br>Countries: ";
                foreach($film['Country'] as $country) {
                    $id = $country['Country']['id'];
                    $name = $country['Country']['name'];
                    $country_thumbnail = new CountryThumbnail($id, $name);
                    $country_thumbnail->render($html);
                }
                
                echo "<br>Casts:<br>";
                foreach($film['Actor'] as $actor) {
                    $id = $actor['Actor']['id'];
                    $name = $actor['Actor']['name'];
                    $profile_path = $actor['Actor']['profile_path'];
                    $country_thumbnail = new ActorThumbnail($id, $name, $profile_path);
                    $country_thumbnail->render_small($html);
                    echo " as " . $actor['actors_films']['character_name'] . "<br>";
                }
                
                $trailer = "http://www.youtube.com/embed/" . $film['Film']['trailer'];
                echo "<br>Trailer:<br>";
                echo "<iframe src=\"$trailer\" width=\"420\" height=\"270\" frameborder=\"0\" allowfullscreen></iframe>";
                
                echo "<br>Reviews:<br>";
                foreach($reviews as $review) {
                    echo $review['Review']['username'] . " - " . $review['Review']['content'];
                }
                
                // add review
                echo "<h2>Add your own review</h1>";
                echo "<div>";
                echo "<form method=\"post\" action=\"" . $html->getHref('reviews/store/' . $film_id) . "\">";
                echo "<textarea name=\"content\" rows=\"4\" cols=\"50\"></textarea>";
                echo "<input type=\"submit\" value=\"Add review\">";
                echo "</form>";
                echo "</div>";
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->