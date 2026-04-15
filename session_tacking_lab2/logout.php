<?php
if (session_status() === PHP_SESSION_NONE) session_start();
unset($_SESSION['username']);
// Clear remember me cookie
if (isset($_COOKIE['remember_user'])) {
    setcookie('remember_user', '', time() - 3600, '/');
}
header('Location: index.php');
exit;
