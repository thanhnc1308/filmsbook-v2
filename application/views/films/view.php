<div class="content bg-body pt-4">
    <div class="container">
        <div class="content-body d-flex mt-4">
            <?php
                echo "<h1>Title: " . $film['Film']['title'] . "</h1>";
                $poster_path = $film['Film']['avatar'];
                echo "<img src=\"$poster_path\" width=\"154\">";
                echo "Description: " . $film['Film']['description'];
                echo "Release Date: " . $film['Film']['release_date'];
                echo "Popularity: " . $film['Film']['popularity'];
                echo "Length: " . $film['Film']['length'];

                echo "Budget: " . $film['Film']['budget'];
                echo "Original Language: " . $film['Film']['original_language'];
//                echo "Poster Path: " . $film['Film']['poster_path'];
//                echo "Trailer: " . $film['Film']['trailer'];
                echo "Revenue: " . $film['Film']['revenue'];
                echo "Vote Average: " . $film['Film']['vote_average'];
                echo "Vote Count: " . $film['Film']['vote_count'];

                echo "Genres: ";
                foreach($film['Genre'] as $genre) {
                    echo $genre['Genre']['name'] . " ";
                }
                
                echo "Companies: ";
                foreach($film['Company'] as $company) {
                    echo $company['Company']['name'] . " ";
                }
                
                echo "Countries: ";
                foreach($film['Country'] as $country) {
                    echo $country['Country']['name'] . " ";
                }
                
                echo "Reviews: ";
                foreach($reviews as $review) {
                    echo "Username:" . $review['Review']['username'];
                    echo "Content: " . $review['Review']['content'];
                }
                
                echo "Casts: ";
                foreach($film['Actor'] as $actor) {
                    echo "Name: " . $actor['Actor']['name'];
                    echo "Character: " . $actor['actors_films']['character_name'];
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