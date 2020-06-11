<div class="content bg-body pt-4">
    <div class="container">
        <div class="content-body d-flex mt-4">
            <?php
                foreach($actors as $actor) {
                    echo "<h1>Name: " . $actor['Actor']['name'] . "</h1>";
                    echo "Birthday: " . $actor['Actor']['birthday'];
                    echo "Deathday: " . $actor['Actor']['deathday'];
                    echo "Moviedb_id: " . $actor['Actor']['moviedb_id'];
                    echo "Gender: ";
                    if($actor['Actor']['gender'] == 1) {
                        echo "Female";
                    } else {
                        echo "Male";
                    }
                    echo "Popularity: " . $actor['Actor']['popularity'];
                    echo "Place of birth: " . $actor['Actor']['place_of_birth'];
                    echo "Profile path: " . $actor['Actor']['profile_path'];
                    echo "Biography: " . $actor['Actor']['biography'];
                    
                    echo "<br>";
                    echo "<hr>";
                }
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->