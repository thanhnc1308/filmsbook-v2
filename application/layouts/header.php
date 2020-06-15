<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <?php
    $html->includeIcon('film.png');
    $html->includeCss('common');
    $html->includeCss('layout');
    $html->includeCss('films');
    $html->includeCss('collections');
    ?>
    <title>Filmsbook</title>
</head>

<body>
    <div id="app">
        <!-- navbar -->
        <div class="navbar d-flex horizontal-between bg-navbar pl-10 pr-10 pt-2 pb-2 fixed-top">
            <a href="<?php echo $html->getHref('films'); ?>" class="logo d-flex vertical-center no-underline">
                <?php
                $html->includeImage('film.png', 50, 50);
                ?>
                <span class="text-light no-underline logo-text fw-bold">Filmsbook</span>
            </a>
            <div class="navbar-list-item d-flex vertical-center">
                <?php
                if (!isset($username) || !$username) {
                    echo '<div id="navLogin"  class="nav-item active">
                            <a href="/filmsbook-v2/login" class="nav-link text-uppercase mr-3 fw-bold">Log in</a>
                        </div>
                        <div id="navSignup"  class="nav-item">
                            <a href="/filmsbook-v2/signup" class="nav-link text-uppercase mr-3 fw-bold"
                               >Create an account</a
                            >
                        </div>';
                } else {
                    echo '<div id="navProfiles"  class="nav-item">
                            <a href="/filmsbook-v2/profiles" class="nav-link text-uppercase mr-3 fw-bold"
                               >' . $username . '</a
                            >
                        </div>';
                    echo '<div id="navLogout" class="nav-item">
                    <a href="/filmsbook-v2/logout" class="nav-link text-uppercase mr-3 fw-bold">Logout</a>
                        </div>';
                }
                ?>
                <div id='navFilms' class="nav-item">
                    <a href="/filmsbook-v2/films" class="nav-link text-uppercase mr-3 fw-bold">Films</a>
                </div>
                <div id='navCollections' class="nav-item">
                    <a href="/filmsbook-v2/collections" class="nav-link text-uppercase mr-3 fw-bold">Collections</a>
                </div>
                <div class="search">
                    <input type="text" onkeyup="liveSearch.navBarSearch(this.value)" class="input-search rounded bg-dark border text-light pl-2" placeholder="Search" />
                    <div class="livesearch"></div>
                </div>
            </div>
        </div>
        <!-- end navbar -->