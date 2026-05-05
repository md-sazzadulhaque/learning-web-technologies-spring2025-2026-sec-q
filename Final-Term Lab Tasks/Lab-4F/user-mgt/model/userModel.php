<?php
//include_once('db.php');
require_once('db.php');

function login($user){
    $con = getConnection();
    $sql = "select * from user where username='{$user['username']}' and password='{$user['password']}'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) == 1){
        return true;
    }else{
        return false;
    }
}

function addUser($user){
     $con = getConnection();

    $name     = mysqli_real_escape_string($con, $user['name']);
    $username = mysqli_real_escape_string($con, $user['username']);
    $email    = mysqli_real_escape_string($con, $user['email']);
    $password = mysqli_real_escape_string($con, $user['password']);
    $phone    = mysqli_real_escape_string($con, $user['phone']);
    $role     = mysqli_real_escape_string($con, $user['role']);
    $status   = mysqli_real_escape_string($con, $user['status']);

    $sql = "INSERT INTO user (name, username, email, password, phone, role, status) 
            VALUES ('$name', '$username', '$email', '$password', '$phone', '$role', '$status')";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function getUserById($id){

}

function updateUser($user){

}

function deleteUser($id){

}

