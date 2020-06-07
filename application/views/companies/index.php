<div class="content bg-body pt-4">
    <div class="container">
        <div class="content-body d-flex mt-4">
            <?php
                foreach($companies as $company) {
                    $moviedb_id = $company['Company']['moviedb_id'];
                    $name = $company['Company']['name'];
                    echo "<h1>MovieDB ID: $moviedb_id</h1>";
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