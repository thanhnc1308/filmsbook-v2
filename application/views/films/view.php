<div class="content bg-body pt-4">
    <div class="container">
        <div class="content-body d-flex mt-4">
            <?php
                echo "<h1>Title: " . $film['Film']['title'] . "</h1>";
                echo "Overview: " . $film['Film']['overview'];
                echo "Release Date: " . $film['Film']['release_date'];
                echo "Popularity: " . $film['Film']['popularity'];
                echo "Runtime: " . $film['Film']['runtime'];

                echo "MovieDB's ID" . $film['Film']['moviedb_id'];
                echo "Budget: " . $film['Film']['budget'];
                echo "Original Language: " . $film['Film']['original_language'];
                echo "Poster Path: " . $film['Film']['poster_path'];
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

                echo "<br>";
                echo "<hr>";
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->