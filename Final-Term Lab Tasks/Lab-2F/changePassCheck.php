<?php
    session_start();

    if(isset($_POST['submit'])){

        $current = $_POST['current'];
        $new = $_POST['new'];
        $confirm = $_POST['confirm'];

        if($current == "" || $new == "" || $confirm == ""){
            echo "All fields are required!";
        }
        elseif($current != $_SESSION['user']['password']){
            echo "Current password is incorrect!";
        }
        elseif($new != $confirm){
            echo "New passwords do not match!";
        }
        elseif($current == $new){
            echo "New password cannot be same as current password!";
        }
        else{
            $_SESSION['user']['password'] = $new;
            echo "Password changed successfully!";
            echo "<a href='profile.php'>Go to Profile</a>";
        }

    } else {
        header('location: change_password.php');
    }
?>