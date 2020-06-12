<div>
    <h1>Add new Review</h1>
    <div>
        <form method="post" action="<?php echo BASE_PATH; ?>/reviews/store/<?php echo $film_id ?>">
            
            <div>
                <label for="user_id">User id</label>
                <input type="number" name="user_id">
            </div>
            
            <div>
                <label for="content">Content</label>
                <input type="text" name="content">
            </div>
            
            <div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>
</div>