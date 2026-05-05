<?php
session_start();
if (!isset($_SESSION['status'])) {
    header('location: login.html');
}

$name = $_FILES['profilePic']['name'];
$src = $_FILES['profilePic']['tmp_name'];

$des = 'Upload/' . $name;

if ($name == "") {
    echo "Please select a file! ";
    echo "<a href='profilePic.php'>Back</a>";
} else {

    if (move_uploaded_file($src, $des)) {

        $_SESSION['user']['image'] = $name;

        echo "Success! <br>";
        echo "<a href='profile.php'>Go to Profile</a>";
    } else {
        echo "Error";
        echo "<a href='profilePic.php'>Back</a>";
    }
}
?>