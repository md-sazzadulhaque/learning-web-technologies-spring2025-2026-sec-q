<?php
session_start();

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $gender = $_POST['gender'];
    $dob = $_POST['dd']."/".$_POST['mm']."/".$_POST['yyyy'];

    
    if($name == "" || $email == "" || $username == "" || $password == ""){
        echo "All fields are required!";
    }
    elseif($password != $confirmPassword){
        echo "Password does not match!";
    }
    else{
        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'gender' => $gender,
            'dob' => $dob,
            'image' => ''
        ];

        echo "Registration Successful! <a href='login.html'>Login</a>";
    }

}else{
    header('location: Registration.html');
}
?>  