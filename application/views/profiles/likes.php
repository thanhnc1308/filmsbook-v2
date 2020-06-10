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
                class="tab-item ml-3 pt-3 pb-3 pl-2 pr-2 no-underline"
                >
                Watchlists
            </a>
            <a
                href="./likes"
                class="tab-item ml-3 pt-3 pb-3 pl-2 pr-2 no-underline active"
                >
                Likes
            </a>
        </div>
    </div>
    <!-- end tab bar -->
    <!-- tab content-->
    <div class="container tab-content">
        <div class="row">
            <!-- films -->
            <div class="w-50 mr-5">
                <div
                    class="content-header d-flex pb-2 mt-2 vertical-center horizontal-between"
                    >
                    <div class="header-bar">
                        <div class="title">
                            FILMS
                        </div>
                    </div>
                </div>
                <div class="content-body d-flex mt-4">
            <?php foreach ($likelist as $likeItem): ?>
                <div activity-id='<?php echo $likeItem['Activity']['activity_id'] ?>' film-id='<?php echo $likeItem['Activity']['film_id'] ?>' user-id='<?php echo $likeItem['Activity']['user_id'] ?>' class="film-item mr-4">
                            <a href="<?php echo $html->getHref('films/view/' . $likeItem['Activity']['film_id']) ?>">
                                <img
                                    class="rounded"
                                    title='<?php echo $likeItem['Film']['title'] ?>'
                                    width="125"
                                    height="187"
                                    src="<?php echo $likeItem['Film']['avatar'] ?>"
                                    alt=""
                                    srcset=""
                                    />
                            </a>
                            <div class="overlay">
                                <a onclick="activity.toggleLike(<?php echo $likeItem['Activity']['activity_id'] ?>)"><i class="fa fa-heart pointer icon-button like-active"></i></a>
                            </div>
                        </div>
            <?php endforeach ?>
        </div>
            </div>
            <!-- end films -->
            <!-- reviews -->
            <div class="w-50">
                <div
                    class="content-header d-flex pb-2 mt-2 vertical-center horizontal-between"
                    >
                    <div class="header-bar">
                        <div class="title">
                            REVIEWS
                        </div>
                    </div>
                </div>
                <div class="content-body d-flex mt-4">
                    <div class="film-item mr-4">
                        <a href="/film-item">
                            <img
                                class="rounded"
                                width="125"
                                height="187"
                                src="https://a.ltrbxd.com/resized/film-poster/4/7/4/4/7/1/474471-extraction-0-230-0-345-crop.jpg?k=c76c8df131"
                                alt=""
                                srcset=""
                                />
                        </a>
                        <div class="overlay">
                            <a href="/watch"
                               ><i
                                    class="fa fa-eye pointer mr-2 icon-button watch-active"
                                    ></i
                                ></a>
                            <a href="/like"
                               ><i
                                    class="fa fa-heart pointer icon-button like-active"
                                    ></i
                                ></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end reviews -->
        </div>
    </div>
    <!-- end tab content -->
</div>
<!-- end content -->