<?php

if($status == 0)
    header('Location: ' . $html->getHref('reviews'));

$film = $review['Film'];
$review_id = $review['Review']['id'];
$review_content = $review['Review']['content'];
?>

<h1>Edit review for <?php echo $film['Film']['title']; ?></h1>
<div>
    <form method="post" action="/filmsbook-v2/reviews/update/<?php echo $review_id; ?>">
        <div>
            <label>Content</label>
            <textarea name=\"content\">
                <?php echo $film['Film']['title']; ?>
            </textarea>
        </div>
    </form>
</div>