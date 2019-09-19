<?php
// This file should be named logout.php
session_start();
// Unset all of the session variables.
$_SESSION = array();
// destroy the session. This time, I mean it. :-) 
// the code below is used with gratitude from the url below,
// http://php.net/manual/en/function.session-destroy.php
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// destroy the session
session_destroy();
header('location:orgLogin.php');