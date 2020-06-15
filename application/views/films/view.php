<?php
if ($status == 0)
    header("Location: " . $html->getHref('films'));

$film_id = $film['Film']['id'];
$title = $film['Film']['title'];
$avatar = $film['Film']['avatar'];
$description = $film['Film']['description'];

$release = $film['Film']['release_date'];
$length = $film['Film']['length'];
$lang = $film['Film']['original_language'];
$budget = $film['Film']['budget'];
$revenue = $film['Film']['revenue'];
$popularity = $film['Film']['popularity'];
$voteav = $film['Film']['vote_average'];
$votec = $film['Film']['vote_count'];
$trailer = $film['Film']['trailer'];

$fields = [
    'Release' => $release,
    'Length' => $length,
    'Lang' => $lang,
    'Budget' => $budget,
    'Revenue' => $revenue,
    'Popularity' => $popularity,
    'Vote average' => $voteav,
    'Vote count' => $votec
];
?>

<div class="content bg-body pt-4">
    <!-- tab bar-->
    <?php
    $tabbar = new TabBar('films');
    $tabbar->render($html);
    ?>

    <div class="container">
        <div class="content-body mt-4">
            <div class="d-flex">
                <div class="film-avatar">
                    <img src="<?php echo $avatar; ?>" class="rounded" width="192">
                </div>

                <div class="film-overview">
                    <h1><?php echo $title; ?></h1>
                    <div class="fav-bar">
                        <button id="watch-btn" class="btn">Watch</button>
                        <button id="like-btn" class="btn">Like</button>
                    </div>
                    <p><?php echo $description; ?></p>
                </div>
            </div>
            
            
            <!--Toolbar-->
            <?php
                $toolbar = new ToolBar('films', $film_id);
                $toolbar->render($html);
            ?>
            <hr>

            <div class="film-detail">
                <?php
                foreach ($fields as $title => $value) {
                    $di = new DetailItem($title, $value);
                    $di->render();
                }
                ?>

                <div class="film-detail-item">
                    <div class="film-detail-title">
                        <h3>Countries</h3>
                    </div>
                    <div class="film-detail-content">
                        <?php
                        foreach ($film['Country'] as $country) {
                            $id = $country['Country']['id'];
                            $name = $country['Country']['name'];
                            $country_thumbnail = new CountryThumbnail($id, $name);
                            echo "<h4>";
                            $country_thumbnail->render($html);
                            echo "</h4>";
                        }
                        ?>
                    </div>
                </div>

                <div class="film-detail-item">
                    <div class="film-detail-title">
                        <h3>Companies</h3>
                    </div>
                    <div class="film-detail-content">
                        <?php
                        foreach ($film['Company'] as $company) {
                            $id = $company['Company']['id'];
                            $name = $company['Company']['name'];
                            $company_thumbnail = new CompanyThumbnail($id, $name);
                            echo "<h4>";
                            $company_thumbnail->render($html);
                            echo "</h4>";
                        }
                        ?>
                    </div>
                </div>

                <div class="film-detail-item">
                    <div class="film-detail-title">
                        <h3>Genres</h3>
                    </div>
                    <div class="film-detail-content">
                        <?php
                        foreach ($film['Genre'] as $genre) {
                            $id = $genre['Genre']['id'];
                            $name = $genre['Genre']['name'];
                            $genre_thumbnail = new GenreThumbnail($id, $name);
                            echo "<h4>";
                            $genre_thumbnail->render($html);
                            echo "</h4>";
                        }
                        ?>
                    </div>
                </div>

                <div class="film-detail-item">
                    <div class="film-detail-title">
                        <h3>Casts</h3>
                    </div>
                    <div class="film-detail-content">
                        <?php
                        foreach ($film['Actor'] as $actor) {
                            $id = $actor['Actor']['id'];
                            $name = $actor['Actor']['name'];
                            $profile_path = $actor['Actor']['profile_path'];
                            $actor_thumbnail = new ActorThumbnail($id, $name, $profile_path);

                            // render
                            echo "<div class=\"d-flex\">";
                            echo "<div>";
                            echo "<h4>";
                            $actor_thumbnail->render_small($html);
                            echo "</h4>";
                            echo "</div>";
                            echo "<div class=\"pl-1\">";
                            echo "<h4> as " . $actor['actors_films']['character_name'] . "</h4>";
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>

                <?php
                $di = new DetailItem('Trailer', $film['Film']['trailer']);
                $di->render();
                ?>

                <hr>
                <div>
                    <h3>Reviews</h3>
                    <div>
                        <?php
                        foreach ($reviews as $review) {
                            echo "<h4>";
                            echo "<a class=\"film-link\" href=\"" . $html->getHref('reviews/view/' . $review['Review']['id']) . "\">Review</a>";
                            echo " by " . $review['Review']['username'] . "</h4>";
                            echo "<p>" . $review['Review']['content'] . "</p>";
                        }
                        ?>
                    </div>

                    <div>
                        <form method="post" action="<?php echo $html->getHref('reviews/store/' . $film_id); ?>">
                            <textarea class="fullsize-textbox" name="content" rows="5"  placeholder="Your review"></textarea>
                            <input class="review-btn mt-2" type="submit" value="Add your own review">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->