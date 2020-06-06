<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300&display=swap"
            rel="stylesheet"
            />
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            />
        <?php
            $html->includeIcon('film.png');
            $html->includeCss('common');
            $html->includeCss('layout');
            $html->includeCss('films');
            $html->includeCss('collections');
        ?>
        <title>Films Review</title>
    </head>
    <body>
        <div id="app">
            <!-- navbar -->
            <div
                class="navbar d-flex horizontal-between bg-navbar pl-10 pr-10 pt-2 pb-2 fixed-top"
                >
                <a href="#" class="logo d-flex vertical-center no-underline">
                    <?php
                        $html->includeImage('film.png', 50, 50);
                    ?>
                    <span class="text-light no-underline logo-text fw-bold"
                          >FilmsReview</span
                    >
                </a>
                <div class="navbar-list-item d-flex vertical-center">
                    <div onclick="onNavItemClick(this)" class="nav-item active">
                        <a href="#" class="nav-link text-uppercase mr-3 fw-bold">Sign in</a>
                    </div>
                    <div onclick="onNavItemClick(this)" class="nav-item">
                        <a href="#" class="nav-link text-uppercase mr-3 fw-bold"
                           >Create an account</a
                        >
                    </div>
                    <div onclick="onNavItemClick(this)" class="nav-item">
                        <a href="#" class="nav-link text-uppercase mr-3 fw-bold"
                           >Username</a
                        >
                    </div>
                    <div onclick="onNavItemClick(this)" class="nav-item">
                        <a href="#" class="nav-link text-uppercase mr-3 fw-bold">Films</a>
                    </div>
                    <div onclick="onNavItemClick(this)" class="nav-item">
                        <a href="#" class="nav-link text-uppercase mr-3 fw-bold">Lists</a>
                    </div>
                    <div class="search">
                        <input
                            type="text"
                            class="input-search rounded bg-dark border text-light pl-2"
                            placeholder="Search"
                            />
                    </div>
                </div>
            </div>
            <!-- end navbar -->