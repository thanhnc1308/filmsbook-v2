<div>
    <?php
    $selected_genres = $film['Genre']; 
    $selected_companies = $film['Company'];
    $selected_countries = $film['Country'];
    
    // create an array of selected items;
    $selected_genre_ids = [];
    foreach($selected_genres as $genre) {
        $id = $genre['Genre']['id'];
        array_push($selected_genre_ids, $id);
    }
    
    $selected_country_ids = [];
    foreach($selected_countries as $country) {
        $id = $country['Country']['id'];
        array_push($selected_country_ids, $id);
    }
    
    $selected_company_ids = [];
    foreach($selected_companies as $company) {
        $id = $company['Company']['id'];
        array_push($selected_company_ids, $id);
    }
    ?>
    <h1>Edit movie: <?php echo $film['Film']['title']; ?></h1>
    <div>
        <form method="post" action="/filmsbook-v2/films/update/<?php echo $film['Film']['id']; ?>">
            <div>
                <label>Title</label>
                <input type="text" name="title" value="<?php echo $film['Film']['title']; ?>">
            </div>
            
            <div>
                <label>Overview</label>
                <input type="text" name="overview" value="<?php echo $film['Film']['overview']; ?>">
            </div>

            <div>
                <label>Release date</label>
                <input type="date" name="release_date" value="<?php echo $film['Film']['release_date']; ?>">
            </div>

            <div>
                <label>Popularity</label>
                <input type="number" step="0.1" name="popularity" value="<?php echo $film['Film']['popularity']; ?>">
            </div>

            <div>
                <label>Runtime</label>
                <input type="number" name="runtime" value="<?php echo $film['Film']['runtime']; ?>">
            </div>

            <div>
                <label>Moviedb_id</label>
                <input type="number" name="moviedb_id" value="<?php echo $film['Film']['moviedb_id']; ?>">
            </div>

            <div>
                <label>Budget</label>
                <input type="number" name="budget" value="<?php echo $film['Film']['budget']; ?>">
            </div>

            <div>
                <label>Original_language</label>
                <input type="text" name="original_language" value="<?php echo $film['Film']['original_language']; ?>">
            </div>

            <div>
                <label>Poster_path</label>
                <input type="text" name="poster_path" value="<?php echo $film['Film']['poster_path']; ?>">
            </div>

            <div>
                <label>Revenue</label>
                <input type="number" name="revenue" value="<?php echo $film['Film']['revenue']; ?>">
            </div>

            <div>
                <label>Vote_average</label>
                <input type="number" step="0.1" name="vote_average" value="<?php echo $film['Film']['vote_average']; ?>">
            </div>

            <div>
                <label>Vote_count</label>
                <input type="number" name="vote_count" value="<?php echo $film['Film']['vote_count']; ?>">
            </div>

            <div>
                <label>Genres</label>
                <select name="genres[]" multiple>
                    <?php
                        foreach($genres as $genre) {
                            $id = $genre['Genre']['id'];
                            echo "<option value=$id";
                            if(in_array($id, $selected_genre_ids)) {
                                echo " selected";
                            }
                            echo ">";
                            echo $genre['Genre']['name'];
                            echo "</option>";                            
                        }
                    ?>
                </select>
            </div>
            
            <div>
                <label>Companies</label>
                <select name="companies[]" multiple>
                    <?php
                        foreach($companies as $company) {
                            $id = $company['Company']['id'];
                            echo "<option value=$id";
                            if(in_array($id, $selected_company_ids)) {
                                echo " selected";
                            }
                            echo ">";
                            echo $company['Company']['name'];
                            echo "</option>";                            
                        }
                    ?>
                </select>
            </div>
            
            <div>
                <label>Countries</label>
                <select name="countries[]" multiple>
                    <?php
                        foreach($countries as $country) {
                            $id = $country['Country']['id'];
                            echo "<option value=$id";
                            if(in_array($id, $selected_country_ids)) {
                                echo " selected";
                            }
                            echo ">";
                            echo $country['Country']['name'];
                            echo "</option>";                            
                        }
                    ?>
                </select>
            </div>
            
            <div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>
</div>