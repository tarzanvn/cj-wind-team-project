<?php
session_start();

// remove session
if (isset($_SESSION["logged"])) {
    $_SESSION = array();
    session_destroy();
}

// remove cookie
if (ini_get("session.use_cookies")) {
  unset($_COOKIE[session_name()]);
  setcookie(session_name(), '', time() - 42000);
}

header("Location: login.php");
