<div class="content bg-body pt-4">
    <div class="container">
        <div class="content-body d-flex mt-4">
            <?php
                foreach($actors as $actor) {
                    $name = $actor['Actor']['name'];
                    $profile_path = $actor['Actor']['profile_path'];
                    $id = $actor['Actor']['id'];
                    
                    $actor_thumbnail = new ActorThumbnail($id, $name, $profile_path);
                    $actor_thumbnail->render($html);
                }
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->