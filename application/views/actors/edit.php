<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ($status == 0)
    header('Location: ' . $html->getHref('actors'));

?>

<div class="content bg-body pt-4">
    <div class="container">
        <div>
            <h1>Edit actor: <?php if ($actor['Actor']['birthday']) echo $actor['Actor']['name']; ?></h1>
            <div>
                <form method="post" action="<?php echo $html->getHref('actors/update/') . $actor['Actor']['id']; ?>">
                    <div>
                        <div>Birthday</div>
                        <input type="date" name="birthday" value="<?php if ($actor['Actor']['birthday'] != null) echo $actor['Actor']['birthday']; ?>">
                    </div>

                    <div>
                        <div for="deathday">Deathday</div>
                        <input type="date" name="deathday" value="<?php if ($actor['Actor']['deathday'] != null) echo $actor['Actor']['deathday']; ?>">
                    </div>

                    <div>
                        <div for="name">Name</div>
                        <input type="text" name="name" value="<?php if ($actor['Actor']['name'] != null) echo $actor['Actor']['name']; ?>">
                    </div>

                    <div>
                        <div for="gender">Gender</div>
                        <input type="range" name="gender" min="1" max="2" value="<?php if ($actor['Actor']['gender'] != null) echo $actor['Actor']['gender']; ?>">
                    </div>

                    <div>
                        <div for="biography">Biography</div>
                        <textarea name="biography"><?php if ($actor['Actor']['biography'] != null) echo $actor['Actor']['biography']; ?></textarea>
                    </div>

                    <div>
                        <div for="popularity">Popularity</div>
                        <input type="text" name="popularity" value="<?php if ($actor['Actor']['popularity'] != null) echo $actor['Actor']['popularity']; ?>">
                    </div>

                    <div>
                        <div for="place_of_birth">Place of birth</div>
                        <input type="text" name="place_of_birth" value="<?php if ($actor['Actor']['place_of_birth'] != null) echo $actor['Actor']['place_of_birth']; ?>">
                    </div>

                    <div>
                        <div for="profile_path">Profile path (path to picture)</div>
                        <input type="text" name="profile_path" value="<?php if ($actor['Actor']['profile_path'] != null) echo $actor['Actor']['profile_path']; ?>">
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