<!-- content -->
<div class="content content-login bg-body pt-4">
    <div class="login-box w-25 mx-auto pt-3 pb-3 pl-3 pr-3 rounded w-fit bg-login">
        <div class="login-title text-center">
            <h2>Sign up</h2>
        </div>
        <div class="login-form">
            <form class="d-flex flex-column mb-3 border-bottom" action="" method="post">
            <input class="pl-2 pr-2 pt-2 pb-2 mb-2 rounded" type="text" placeholder="Username" name="username" id="username">
                <input class="pl-2 pr-2 pt-2 pb-2 mb-2 rounded" type="text" placeholder="Email address" name="email" id="email">
                <input class="pl-2 pr-2 pt-2 pb-2 mb-2 rounded" type="password" placeholder="Password" name="password" id="password">
                <input class="pl-2 pr-2 pt-2 pb-2 rounded bg-success" type="submit" value="Create your account" id='signup'>
            </form>
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