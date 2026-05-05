<?php
    session_start();

    if (isset($_REQUEST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == "admin" && $password == "123"){
            $_SESSION['status'] = true;
            $_SESSION['role'] = "admin";
            header('location: ../view/admin_home.php');
        }
        else if(isset($_SESSION['registeredUser'])){

            $user = $_SESSION['registeredUser'];

            if($username == $user['username'] && $password == $user['password']){
                $_SESSION['status'] = true;
                $_SESSION['role'] = "user";
                header('location: ../view/home.php');
            }
            else{
                echo "Invalid User!";
            }

        }
        else{
            echo "Invalid User!";
        }
    } else {
        header('location: login.html');
    }
    
?>