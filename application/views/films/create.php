<div>
    <h1>Add new Movie</h1>
    <div>
        <form method="post" action="/filmsbook-v2/films/store">
            <div>
                <label>Name</label>
                <input type="text" name="name">
            </div>
            
            <div>
                <label>Description</label>
                <input type="text" name="description">
            </div>
            
            <div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>
</div>