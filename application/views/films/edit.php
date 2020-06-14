<div class="content bg-body pt-4">
    <div class="container">
        <div>
            <?php
            $selected_genres = $film['Genre'];
            $selected_companies = $film['Company'];
            $selected_countries = $film['Country'];

            // create an array of selected items;
            $selected_genre_ids = [];
            foreach ($selected_genres as $genre) {
                $id = $genre['Genre']['id'];
                array_push($selected_genre_ids, $id);
            }

            $selected_country_ids = [];
            foreach ($selected_countries as $country) {
                $id = $country['Country']['id'];
                array_push($selected_country_ids, $id);
            }

            $selected_company_ids = [];
            foreach ($selected_companies as $company) {
                $id = $company['Company']['id'];
                array_push($selected_company_ids, $id);
            }
            ?>
            <h1>Edit movie: <?php echo $film['Film']['title']; ?></h1>
            <div>
                <form method="post" action="/filmsbook-v2/films/update/<?php echo $film['Film']['id']; ?>">
                    <div>
                        <div>Title</div>
                        <input type="text" name="title" value="<?php echo $film['Film']['title']; ?>">
                    </div>

                    <div>
                        <div>Description</div>
                        <input type="text" name="description" value="<?php echo $film['Film']['description']; ?>">
                    </div>

                    <div>
                        <div>Release date</div>
                        <input type="date" name="release_date" value="<?php echo $film['Film']['release_date']; ?>">
                    </div>

                    <div>
                        <div>Popularity</div>
                        <input type="number" step="0.1" name="popularity" value="<?php echo $film['Film']['popularity']; ?>">
                    </div>

                    <div>
                        <div>Length</div>
                        <input type="number" name="length" value="<?php echo $film['Film']['length']; ?>">
                    </div>

                    <div>
                        <div>Budget</div>
                        <input type="number" name="budget" value="<?php echo $film['Film']['budget']; ?>">
                    </div>

                    <div>
                        <div>Original_language</div>
                        <input type="text" name="original_language" value="<?php echo $film['Film']['original_language']; ?>">
                    </div>

                    <div>
                        <div>Avatar</div>
                        <input type="text" name="avatar" value="<?php echo $film['Film']['avatar']; ?>">
                    </div>

                    <div>
                        <div>Trailer path</div>
                        <input type="text" name="trailer" value="<?php echo $film['Film']['trailer']; ?>">
                    </div>

                    <div>
                        <div>Revenue</div>
                        <input type="number" name="revenue" value="<?php echo $film['Film']['revenue']; ?>">
                    </div>

                    <div>
                        <div>Vote_average</div>
                        <input type="number" step="0.1" name="vote_average" value="<?php echo $film['Film']['vote_average']; ?>">
                    </div>

                    <div>
                        <div>Vote_count</div>
                        <input type="number" name="vote_count" value="<?php echo $film['Film']['vote_count']; ?>">
                    </div>

                    <div>
                        <div>Genres</div>
                        <select name="genres[]" multiple>
                            <?php
                            foreach ($genres as $genre) {
                                $id = $genre['Genre']['id'];
                                echo "<option value=$id";
                                if (in_array($id, $selected_genre_ids)) {
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
                        <div>Companies</div>
                        <select name="companies[]" multiple>
                            <?php
                            foreach ($companies as $company) {
                                $id = $company['Company']['id'];
                                echo "<option value=$id";
                                if (in_array($id, $selected_company_ids)) {
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
                        <div>Countries</div>
                        <select name="countries[]" multiple>
                            <?php
                            foreach ($countries as $country) {
                                $id = $country['Country']['id'];
                                echo "<option value=$id";
                                if (in_array($id, $selected_country_ids)) {
                                    echo " selected";
                                }
                                echo ">";
                                echo $country['Country']['name'];
                                echo "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div id="cast-input-parent">
                        <h1>Casts</h1>
                        <?php
                        foreach ($film['Actor'] as $prev_actor) {
                            $prev_actor_id = $prev_actor['Actor']['id'];
                            $prev_character = $prev_actor['actors_films']['character_name'];

                            echo "<div id=\"cast-input\">";
                            echo "<div>Actor</div>";
                            echo "<select name=\"actors[]\">";
                            echo "<option></option>";
                            foreach ($actors as $actor) {
                                $id = $actor['Actor']['id'];
                                echo "<option value=$id";
                                if ($id == $prev_actor_id)
                                    echo " selected";
                                echo ">";
                                echo $actor['Actor']['name'];
                                echo "</option>";
                            }
                            echo "</select>";
                            echo "<div>Character</div>";
                            echo "<input type=\"text\" name=\"characters[]\" value=\"$prev_character\">";
                            echo "</div>";
                        }
                        ?>
                        <div id="cast-input">
                            <div>Actor</div>
                            <select name="actors[]">
                                <option></option>
                                <?php
                                foreach ($actors as $actor) {
                                    $id = $actor['Actor']['id'];
                                    echo "<option value=$id>";
                                    echo $actor['Actor']['name'];
                                    echo "</option>";
                                }
                                ?>
                            </select>
                            <div>Character</div>
                            <input type="text" name="characters[]">
                        </div>

                    </div>
                    <button id="addcast-btn">Add more cast
            </div>

            <div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
            </form>
        </div>
    </div>
</div>

<?php
$html->includeJs('filmcast');
?>