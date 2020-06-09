<div>
    <h1>Add new Company</h1>
    <div>
        <form method="post" action="/filmsbook-v2/companies/store">
            <div>
                <label for="moviedb_id">MovieDB ID</label>
                <input type="number" name="moviedb_id">
            </div>
            
            <div>
                <label for="name">Name</label>
                <input type="text" name="name">
            </div>
            
            <div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>
</div>