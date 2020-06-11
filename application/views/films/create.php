<div>
    <h1>Add new Movie</h1>
    <div>
        <form method="post" action="/filmsbook-v2/films/store">
            <div>
                <label>Title</label>
                <input type="text" name="title">
            </div>
            
            <div>
                <label>Overview</label>
                <input type="text" name="overview">
            </div>

            <div>
                <label>Release date</label>
                <input type="date" name="release_date">
            </div>

            <div>
                <label>Popularity</label>
                <input type="number" step="0.1" name="popularity">
            </div>

            <div>
                <label>Runtime</label>
                <input type="number" name="runtime">
            </div>

            <div>
                <label>Moviedb_id</label>
                <input type="number" name="moviedb_id">
            </div>

            <div>
                <label>Budget</label>
                <input type="number" name="budget">
            </div>

            <div>
                <label>Original_language</label>
                <input type="text" name="original_language">
            </div>

            <div>
                <label>Poster_path</label>
                <input type="text" name="poster_path">
            </div>

            <div>
                <label>Revenue</label>
                <input type="number" name="revenue">
            </div>

            <div>
                <label>Vote_average</label>
                <input type="number" step="0.1" name="vote_average">
            </div>

            <div>
                <label>Vote_count</label>
                <input type="number" name="vote_count">
            </div>

            <div>
                <label>Genres</label>
                <select name="genres[]" multiple>
                    <?php
                        foreach($genres as $genre) {
                            $id = $genre['Genre']['id'];
                            echo "<option value=$id>";
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
                            echo "<option value=$id>";
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
                            echo "<option value=$id>";
                            echo $country['Country']['name'];
                            echo "</option>";                            
                        }
                    ?>
                </select>
            </div>
            
            <div id="cast-input-parent">
                <h1>Casts</h1>
                <div id="cast-input">
                    <label>Actor</label>
                    <select name="actors[]">
                        <?php
                            foreach($actors as $actor) {
                                $id = $actor['Actor']['id'];
                                echo "<option value=$id>";
                                echo $actor['Actor']['name'];
                                echo "</option>";                            
                            }
                        ?>
                    </select>
                    <label>Character</label>
                    <input type="text" name="characters[]">
                </div>
                
            </div>
            <button id="addcast-btn">Add more cast</div>
            
            
            <div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>
</div>

<?php
$html->includeJs('filmcast');
?>