<?php
if ($status == 0)
    header("Location: " . $html->getHref('reviews'));
?>

<div class="content bg-body pt-4">
    <!-- tab bar-->
    <?php
    $tabbar = new TabBar('reviews');
    $tabbar->render($html);
    ?>

    <div class="container">
        <div class="content-body mt-4">
            <?php
            $username = $review['User']['username'];
            $content = $review['Review']['content'];

            $film = $review['Film'];
            $film_id = $film['id'];
            $film_avatar = $film['avatar'];
            $film_title = $film['title'];
            $film_thumbnail = new FilmThumbnail($film_id, $film_title, $film_avatar);

            $film_thumbnail->render_small($html);
            echo "<p> - a review by $username</p>";

            echo $content;

            $toolbar = new ReviewToolBar('reviews', $review['Review']['id'], $review['Review']['user_id']);
            $toolbar->render($html);
            ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->