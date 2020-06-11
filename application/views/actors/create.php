<div>
    <h1>Add new Actor</h1>
    <div>
        <form method="post" action="/filmsbook-v2/actors/store">
            <div>
                <label for="moviedb_id">MovieDB ID</label>
                <input type="text" name="moviedb_id">
            </div>
            
            <div>
                <label for="birthday">Birthday</label>
                <input type="date" name="birthday">
            </div>
            
            <div>
                <label for="deathday">Deathday</label>
                <input type="text" name="deathday">
            </div>
            
            <div>
                <label for="name">Name</label>
                <input type="text" name="name">
            </div>
            
            <div>
                <label for="gender">Gender</label>
                <input type="range" name="gender" min="1" max="2">
            </div>
            
            <div>
                <label for="biography">Biography</label>
                <input type="text" name="biography">
            </div>
            
            <div>
                <label for="popularity">Popularity</label>
                <input type="text" name="popularity">
            </div>
            
            <div>
                <label for="place_of_birth">Place of birth</label>
                <input type="text" name="place_of_birth">
            </div>
            
            <div>
                <label for="profile_path">Profile path (path to picture)</label>
                <input type="text" name="profile_path">
            </div>
            
            <div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>
</div>