<div class="content bg-body pt-4">
    <!-- tab bar-->
    <?php
    $tabbar = new TabBar('reviews');
    $tabbar->render($html);
    ?>
    
    <div class="container">
        <div class="content-body d-flex mt-4">
            <?php
            foreach($reviews as $review) {
                $id = $review['Review']['id'];
                $author = $review['User']['username'];
                $avatar = $review['Film']['avatar'];
                
                $review_thumbnail = new ReviewThumbnail($id, $author, $avatar);
                $review_thumbnail->render($html);
            }
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->