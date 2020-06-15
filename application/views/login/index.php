<?php
if($session==1){
    header("Location: http://localhost/filmsbook-v2/profiles");
}
?>

<!-- content -->
<div class="content content-login bg-body pt-4">
    <div class="login-box w-25 mx-auto pt-3 pb-3 pl-3 pr-3 rounded w-fit bg-login">
        <div class="login-title text-center">
            <h2>Log in</h2>
        </div>
        <div class="login-form">
            <div class="d-flex flex-column mb-3 border-bottom" action="" method="post">
                <input class="pl-2 pr-2 pt-2 pb-2 mb-2 rounded border-input" type="text" placeholder="Username" name="username" id="username">
                <input class="pl-2 pr-2 pt-2 pb-2 mb-2 rounded border-input" type="password" placeholder="Password" name="password" id="password">
                <div id="login-error" style="color: red; display:none">Username or password is incorrect</div>
                <input class="pl-2 pr-2 pt-2 pb-2 rounded bg-success pointer" type="submit" value="Log in" id='login'>
            </div>
        </div>
        <div class="divider pt-2 border border-bottom-0 border-left-0 border-right-0"></div>
        <div class="register">
            <div class="d-flex flex-column">
                <a href='/filmsbook-v2/signup' class="pl-2 pr-2 pt-2 pb-2 rounded bg-danger text-center no-default-link">Sign up New Account</a>
            </div>
        </div>
    </div>
</div>
<!-- end content -->

<?php
$html->includeJs('auth');
?>