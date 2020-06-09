<!-- content -->
<div class="content bg-body pt-4">
    <!-- tab bar-->
    <div class="container tab-bar">
        <div class="row vertical-center">
            <div class="user mr-4 ml-4">
                <i class="fa fa-user user-icon"></i>
                <a href="#" class="fw-bold no-underline username"><?php echo $username ?></a>
            </div>
            <a
                href="./watchlist"
                class="tab-item ml-3 pt-3 pb-3 pl-2 pr-2 no-underline active"
                >
                Watchlists
            </a>
            <a
                href="./likes"
                class="tab-item ml-3 pt-3 pb-3 pl-2 pr-2 no-underline"
                >
                Likes
            </a>
        </div>
    </div>
    <!-- end tab bar -->
    <!-- tab content-->
    <div class="container tab-content">
        <div class="content-header d-flex pb-2 mt-2 vertical-center horizontal-between">
            <div class="header-bar">
                <div class="title">
                    YOU WANT TO SEE <?php echo $numberOfWatch ?> FILM
                </div>
            </div>
            <div class="filter d-flex">
                <!-- <div class="filter-item mr-3">
                  Genre
                </div> -->
                <div class="sorter">Sort by
                    <select class="sort-item" id="sortFilm">
                        <option value="whenAdded">When Added</option>
                        <option value="filmName">Film Name</option>
                        <option value="rating">Rating</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="content-body d-flex mt-4">
            <?php foreach ($watchlist as $watchItem): ?>
                <div activity-id='<?php echo $watchItem['Activity']['activity_id'] ?>' class="film-item mr-4">
                            <a href="<?php echo $html->getHref('films/view/' . $watchItem['Activity']['film_id']) ?>">
                                <img
                                    class="rounded"
                                    title='<?php echo $watchItem['Film']['title'] ?>'
                                    width="125"
                                    height="187"
                                    src="<?php echo $watchItem['Film']['avatar'] ?>"
                                    alt=""
                                    srcset=""
                                    />
                            </a>
                            <div class="overlay">
                                <a href="/watch"><i class="fa fa-eye pointer mr-2 icon-button watch-active"></i></a>
                                <a href="/like"><i class="fa fa-heart pointer icon-button like-active"></i></a>
                            </div>
                        </div>
            <?php endforeach ?>
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->

<?php
$html->includeJs('profile');
?>