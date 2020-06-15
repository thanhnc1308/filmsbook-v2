<div class="content bg-body pt-4">
    <!-- tab bar-->
    <?php
    $tabbar = new TabBar('companies');
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
                $create_btn = new CreateButton('companies');
                $create_btn->render($html);
                } 
            }
        ?>
        
        <div class="content-body mt-4">
            <?php
                foreach($companies as $company) {
                    $id = $company['Company']['id'];
                    $name = $company['Company']['name'];
                    $company_thumbnail = new CompanyThumbnail($id, $name);
                    $company_thumbnail->render($html);
                    echo "<br>";
                }
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->