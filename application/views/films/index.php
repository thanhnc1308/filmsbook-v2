<div class="content bg-body pt-4">
    <div class="container">
        <div class="content-body d-flex mt-4">
            <?php
//                var_dump($films);
                foreach($films as $film) {
//                    <?php echo $html->link($category['Category']['name'], 'categories/view/' . $category['Category']['id'] . '/' . $category['Category']['name'])
                    $name = $film['Film']['name'];
                    $description = $film['Film']['description'];
                    echo "<h1>Name: $name</h1>";
                    echo "<p>Description: $description</p>";
                    echo "<br>";
                    echo "<hr>";
                }
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->