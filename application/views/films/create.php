<div class="content bg-body pt-4">
    <div class="container">
        <div>
            <h1>Add new Movie</h1>
            <div>
                <form method="post" action="/filmsbook-v2/films/store">
                    <div>
                        <div>Title</div>
                        <input type="text" name="title">
                    </div>

                    <div>
                        <div>Description</div>
                        <input type="text" name="description">
                    </div>

                    <div>
                        <div>Release date</div>
                        <input type="date" name="release_date">
                    </div>

                    <div>
                        <div>Popularity</div>
                        <input type="number" step="0.1" name="popularity">
                    </div>

                    <div>
                        <div>Length</div>
                        <input type="number" name="length">
                    </div>

                    <div>
                        <div>Budget</div>
                        <input type="number" name="budget">
                    </div>

                    <div>
                        <div>Original language</div>
                        <input type="text" name="original_language">
                    </div>

                    <div>
                        <div>Avatar</div>
                        <input type="text" name="avatar">
                    </div>

                    <div>
                        <div>Trailer path</div>
                        <input type="text" name="trailer">
                    </div>

                    <div>
                        <div>Revenue</div>
                        <input type="number" name="revenue">
                    </div>

                    <div>
                        <div>Vote average</div>
                        <input type="number" step="0.1" name="vote_average">
                    </div>

                    <div>
                        <div>Vote count</div>
                        <input type="number" name="vote_count">
                    </div>

                    <div>
                        <div>Genres</div>
                        <select name="genres[]" multiple>
                            <?php
                            foreach ($genres as $genre) {
                                $id = $genre['Genre']['id'];
                                echo "<option value=$id>";
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
                                echo "<option value=$id>";
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
                    <button id="addcast-btn">Add more cast</div>

                    <div>
                        <input type="submit" value="Submit">
                        <input type="reset" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
$html->includeJs('filmcast');
?>