<?php
    if($status == 0)
        header("Location: " . $html->getHref('films'));
?>

<div class="content bg-body pt-4">
    <div class="container">
        <div class="content-body mt-4">
            <?php
                echo "<h1>Name: " . $actor['Actor']['name'] . "</h1>";
                $profile_path = $actor['Actor']['profile_path'];
                echo "<img src=\"$profile_path\" width=\"154\">";
                echo "<p>Biography: " . $actor['Actor']['biography'] . "</p><br>";
                echo "Birthday: " . $actor['Actor']['birthday'] . "<br>";
                echo "Deathday: " . $actor['Actor']['deathday'] . "<br>";
                echo "Gender: ";
                if($actor['Actor']['gender'] == 1) {
                    echo "Female";
                } else {
                    echo "Male";
                }
                echo "<br>";
                echo "Place of birth: " . $actor['Actor']['place_of_birth'] . "<br>";
                echo "Popularity: " . $actor['Actor']['popularity'] . "<br>";
                
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->