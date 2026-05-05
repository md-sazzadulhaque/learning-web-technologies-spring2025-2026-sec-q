<?php
    require_once('../model/userModel.php');

    if (isset($_POST['submit'])) {
        $user = [
            'name'     => trim($_POST['name']),
            'username' => trim($_POST['username']),
            'email'    => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'phone'    => trim($_POST['phone']),
            'role'     => $_POST['role'],
            'status'   => $_POST['status']
        ];

        if (addUser($user)) {
            echo "User added successfully! <a href='../view/add_user.php'>Go back</a>";
        } else {
            echo "Failed! Username or email may already exist. <a href='../view/add_user.php'>Go back</a>";
        }
    }
?>