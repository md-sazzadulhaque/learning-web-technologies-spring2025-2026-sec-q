<?php
session_start();

if (isset($_POST['submit'])) {

    $_SESSION['user']['name'] = $_POST['name'];
    $_SESSION['user']['email'] = $_POST['email'];
    $_SESSION['user']['gender'] = $_POST['gender'];
    $_SESSION['user']['dob'] = $_POST['dd'] . "/" . $_POST['mm'] . "/" . $_POST['yyyy'];

    header('location: profile.php');

} else {
    header('location: edit.php');
}
?>