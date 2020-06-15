<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$role = $this->getUserRole();
$username = $this->getUserName();
if ($role != 'admin') {
    $html = new HTML;
    include(ROOT . DS . 'application' . DS . 'pages' . DS . 'permissiondenied.php');
}
