<?php

if($status == 0)
    header('Location: ' . $html->getHref('reviews'));

$film = $review['Film'];
$review_id = $review['Review']['id'];
$review_content = $review['Review']['content'];
?>

<div class="content-body mt-4">
    <h1>Edit review for <?php echo $film['title']; ?></h1>
    <div>
        <form method="post" action="<?php echo $html->getHref('reviews/update/') . $review_id; ?>">
            <div>
                <label>Content</label>
                <textarea name="content"><?php echo $review_content; ?></textarea>
                <input type="submit" value="Edit">
            </div>
        </form>
    </div>
</div>