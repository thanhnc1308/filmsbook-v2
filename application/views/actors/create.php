<div class="content bg-body pt-4">
    <div class="container">
        <div>
            <h1>Add new Actor</h1>
            <div>
                <form method="post" action="/filmsbook-v2/actors/store">

                    <div>
                        <div for="name">Name</div>
                        <input type="text" name="name" required>
                    </div>

                    <div>
                        <div for="birthday">Birthday</div>
                        <input type="date" name="birthday">
                    </div>

                    <div>
                        <div for="deathday">Deathday</div>
                        <input type="date" name="deathday">
                    </div>

                    <div>
                        <div for="gender">Gender</div>
                        <input type="range" name="gender" min="1" max="2">
                    </div>

                    <div>
                        <div for="biography">Biography</div>
                        <input type="text" name="biography">
                    </div>

                    <div>
                        <div for="popularity">Popularity</div>
                        <input type="text" name="popularity">
                    </div>

                    <div>
                        <div for="place_of_birth">Place of birth</div>
                        <input type="text" name="place_of_birth">
                    </div>

                    <div>
                        <div for="profile_path">Profile path (path to picture)</div>
                        <input type="text" name="profile_path">
                    </div>

                    <div>
                        <input type="submit" value="Submit">
                        <input type="reset" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>