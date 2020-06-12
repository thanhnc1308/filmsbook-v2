<div>
    <h1>Add new Movie</h1>
    <div>
        <form method="post" action="/filmsbook-v2/films/store">
            <div>
                <label>Title</label>
                <input type="text" name="title">
            </div>
            
            <div>
                <label>Description</label>
                <input type="text" name="description">
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
                <label>Length</label>
                <input type="number" name="length">
            </div>

            <div>
                <label>Budget</label>
                <input type="number" name="budget">
            </div>

            <div>
                <label>Original language</label>
                <input type="text" name="original_language">
            </div>

            <div>
                <label>Avatar</label>
                <input type="text" name="avatar">
            </div>
            
            <div>
                <label>Trailer path</label>
                <input type="text" name="trailer">
            </div>

            <div>
                <label>Revenue</label>
                <input type="number" name="revenue">
            </div>

            <div>
                <label>Vote average</label>
                <input type="number" step="0.1" name="vote_average">
            </div>

            <div>
                <label>Vote count</label>
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
                        <option></option>
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