<div class="content bg-body pt-4">
    <!-- tab bar-->
    <?php
    $tabbar = new TabBar('companies');
    $tabbar->render($html);
    ?>
    
    <div class="container">
        <div class="content-body mt-4">
            <?php
                foreach($companies as $company) {
                    $id = $company['Company']['id'];
                    $name = $company['Company']['name'];
                    $company_thumbnail = new CompanyThumbnail($id, $name);
                    $company_thumbnail->render($html);
                }
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->