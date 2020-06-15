<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$role = $this->getUserRole();

if ($role != 'admin') {
    $html = new HTML;
    require_once(ROOT . DS . 'application' . DS . 'pages' . DS . 'permissiondenied.php');
}
