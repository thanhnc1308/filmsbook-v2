<div class="content bg-body pt-4">
    <?php
    $tabbar = new TabBar('genres');
    $tabbar->render($html);
    ?>
    
    <div class="container">
        <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if(isset($_SESSION['role']))
            {
                $role = $_SESSION['role'];
                if($role == 'admin'){
                $create_btn = new CreateButton('genres');
                $create_btn->render($html);
                } 
            }
        ?>
        
        <div class="content-body mt-4">
            <?php
                foreach($genres as $genre) {
                    $name = $genre['Genre']['name'];
                    $id = $genre['Genre']['id'];
                    $genre_thumbnail = new GenreThumbnail($id, $name);
                    $genre_thumbnail->render($html);
                    echo "<br>";
                }
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->