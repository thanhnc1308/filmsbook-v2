<?php
    if($status == 0)
        header("Location: " . $html->getHref('films'));
    
    $name = $actor['Actor']['name'];
    $avatar = $actor['Actor']['profile_path'];
    $biography = $actor['Actor']['biography'];
    $birthday = $actor['Actor']['birthday'];
    $deathday = $actor['Actor']['deathday'];
    $gender = $actor['Actor']['gender'] == 1? 'Female' : 'Male';
    $place_of_birth = $actor['Actor']['place_of_birth'];
    $popularity = $actor['Actor']['popularity'];
    
    $fields = [
        'Birthday' => $birthday,
        'Deathday' => $deathday,
        'Gender' => $gender,
        'Place_of_birth' => $place_of_birth,
        'Popularity' => $popularity,
    ];
?>

<div class="content bg-body pt-4">
    <!-- tab bar-->
    <?php
    $tabbar = new TabBar('actors');
    $tabbar->render($html);
    ?>
    
    <div class="container">
        <div class="content-body mt-4">
            <div class="d-flex">
                <div class="film-avatar">
                    <img src="<?php echo $avatar; ?>" class="rounded" width="192">
                </div>

                <div class="film-overview">
                    <h1><?php echo $name; ?></h1>
                    <p><?php echo $biography; ?></p>
                </div>
            </div>
            
            <?php
                $toolbar = new ToolBar('actors', $actor['Actor']['id']);
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
                        <h3>Films</h3>
                    </div>
                    <div class="film-detail-content">
                        <?php
                        foreach ($actor['Film'] as $film) {
                            $id = $film['Film']['id'];
                            $name = $film['Film']['title'];
                            $poster = $film['Film']['avatar'];
                            $film_thumbnail = new FilmThumbnail($id, $name, $avatar);
                            echo "<h4>";
                            $film_thumbnail->render_small($html);
                            echo "</h4>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->