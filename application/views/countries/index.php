<div class="content bg-body pt-4">
    <!-- tab bar-->
    <?php
    $tabbar = new TabBar('countries');
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
                $create_btn = new CreateButton('countries');
                $create_btn->render($html);
                } 
            }
        ?>
        
        <div class="content-body mt-4">
            <?php
                foreach($countries as $country) {
                    $id = $country['Country']['id'];
                    $name = $country['Country']['name'];
                    $country_thumbnail = new CountryThumbnail($id, $name);
                    $country_thumbnail->render($html);
                    echo "<br>";
                }
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->