<div class="content bg-body pt-4">
    <!-- tab bar-->
    <?php
    $tabbar = new TabBar('countries');
    $tabbar->render($html);
    ?>
    
    <div class="container">
        <div class="content-body d-flex mt-4">
            <?php
                foreach($countries as $country) {
                    $name = $country['Country']['name'];
                    echo "<p>Name: $name</p>";
                    echo "<br>";
                    echo "<hr>";
                }
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->