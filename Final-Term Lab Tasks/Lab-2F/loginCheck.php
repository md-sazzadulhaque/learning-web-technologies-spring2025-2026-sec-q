<?php
session_start();

if (isset($_REQUEST['submit'])) {

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    if ($username == "" || $password == "") {
        echo "null username or password!";
    } else {

        if (
            isset($_SESSION['user']) &&
            $username == $_SESSION['user']['username'] && $password == $_SESSION['user']['password']
        ) {
            $_SESSION['status'] = true;

            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + 86400, '/');
                setcookie('password', $password, time() + 86400, '/');
            } else {
                setcookie('username', '', time() - 10, '/');
                setcookie('password', '', time() - 10, '/');
            }

            header('location: dashboard.php');

        } else {
            echo "invalid user!";
        }
    }

} else {
    header('location: login.html');
}
?>