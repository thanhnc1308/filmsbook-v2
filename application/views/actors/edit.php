<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if($status == 0)
    header('Location: ' . $html->getHref('actors'));
    
?>

<div>
    <h1>Edit actor: <?php if($actor['Actor']['birthday']) echo $actor['Actor']['name']; ?></h1>
    <div>
        <form method="post" action="<?php echo $html->getHref('actors/update/') . $actor['Actor']['id']; ?>">
            <div>
                <label>Birthday</label>
                <input type="date" name="birthday" value="<?php if($actor['Actor']['birthday'] != null) echo $actor['Actor']['birthday']; ?>">
            </div>
            
            <div>
                <label for="deathday">Deathday</label>
                <input type="date" name="deathday"  value="<?php if($actor['Actor']['deathday'] != null) echo $actor['Actor']['deathday']; ?>">
            </div>
            
            <div>
                <label for="name">Name</label>
                <input type="text" name="name"  value="<?php if($actor['Actor']['name'] != null) echo $actor['Actor']['name']; ?>">
            </div>
            
            <div>
                <label for="gender">Gender</label>
                <input type="range" name="gender" min="1" max="2"  value="<?php if($actor['Actor']['gender'] != null) echo $actor['Actor']['gender']; ?>">
            </div>
            
            <div>
                <label for="biography">Biography</label>
                <textarea name="biography"><?php if($actor['Actor']['biography'] != null) echo $actor['Actor']['biography']; ?></textarea>
            </div>
            
            <div>
                <label for="popularity">Popularity</label>
                <input type="text" name="popularity" value="<?php if($actor['Actor']['popularity'] != null) echo $actor['Actor']['popularity']; ?>">
            </div>
            
            <div>
                <label for="place_of_birth">Place of birth</label>
                <input type="text" name="place_of_birth"  value="<?php if($actor['Actor']['place_of_birth'] != null) echo $actor['Actor']['place_of_birth']; ?>">
            </div>
            
            <div>
                <label for="profile_path">Profile path (path to picture)</label>
                <input type="text" name="profile_path"  value="<?php if($actor['Actor']['profile_path'] != null) echo $actor['Actor']['profile_path']; ?>">
            </div>
            
            <div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>
</div>