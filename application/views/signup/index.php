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
    <title>Films Review</title>
</head>

<body>
    <div id="app">
        <!-- navbar -->
        <div class="navbar d-flex horizontal-between bg-navbar pl-10 pr-10 pt-2 pb-2 fixed-top">
            <a href="#" class="logo d-flex vertical-center no-underline">
                <?php
                $html->includeImage('film.png', 50, 50);
                ?>
                <span class="text-light no-underline logo-text fw-bold">FilmsReview</span>
            </a>
            <div class="navbar-list-item d-flex vertical-center">
                <div id='navLogin' class="nav-item active">
                    <a href="/filmsbook-v2/login" class="nav-link text-uppercase mr-3 fw-bold">Log in</a>
                </div>
                <div id='navSignup' class="nav-item">
                    <a href="/filmsbook-v2/signup" class="nav-link text-uppercase mr-3 fw-bold">Create an account</a>
                </div>
                <div id='navFilms' class="nav-item">
                    <a href="/filmsbook-v2/films" class="nav-link text-uppercase mr-3 fw-bold">Films</a>
                </div>
                <div id='navCollections' class="nav-item">
                    <a href="/filmsbook-v2/collections" class="nav-link text-uppercase mr-3 fw-bold">Collections</a>
                </div>
                <div class="search">
                    <input type="text" onkeyup="liveSearch.navBarSearch(this.value)" class="input-search rounded bg-dark border text-light pl-2" placeholder="Search" />
                    <div id="livesearch"></div>
                </div>
            </div>
        </div>
        <!-- end navbar -->
        <!-- content -->
        <div class="content content-login bg-body pt-4">
            <div class="login-box w-25 mx-auto pt-3 pb-3 pl-3 pr-3 rounded w-fit bg-login">
                <div class="login-title text-center">
                    <h2>Sign up</h2>
                </div>
                <div class="login-form">
                    <div class="d-flex flex-column mb-3 border-bottom" action="" method="post">
                        <input class="pl-2 pr-2 pt-2 pb-2 mb-2 rounded border-input" type="text" placeholder="Username" name="username" id="username">
                        <input class="pl-2 pr-2 pt-2 pb-2 mb-2 rounded border-input" type="text" placeholder="Email address" name="email" id="email">
                        <input class="pl-2 pr-2 pt-2 pb-2 mb-2 rounded border-input" type="password" placeholder="Password" name="password" id="password">
                        <div style="color: red; display:none" id="signup-error">Username has already been taken</div>
                        <input class="pl-2 pr-2 pt-2 pb-2 rounded bg-success" type="submit" value="Create your account" id='signup'>
                    </div>
                </div>
                <div class="divider pt-2 border border-bottom-0 border-left-0 border-right-0"></div>
                <div class="register">
                    <div class="d-flex flex-column">
                        <a href='/filmsbook-v2/login' class="pl-2 pr-2 pt-2 pb-2 rounded bg-danger text-center no-default-link">You have an account? Log in here</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end content -->

        <?php
        $html->includeJs('auth');
        ?>