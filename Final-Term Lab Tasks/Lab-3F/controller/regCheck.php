<?php
    session_start();

    if(isset($_POST['submit'])){

        $name       = $_POST['name'];
        $username   = $_POST['username'];
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        $cpassword  = $_POST['cpassword'];

        if($name == "" || $username == "" || $email == "" || $password == "" || $cpassword == ""){
            echo "Null Input!";
        }
        else if($password != $cpassword){
            echo "Password not matched!";
        }
        else{

            $user = [
                'name' => $name,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'role' => 'user'
            ];

            $_SESSION['registeredUser'] = $user;

            echo "Registration Successful! <br><br>";
            echo "<a href='../view/login.html'>Login Now</a>";
        }

    }else{
        header('location: Registration.html');
    }
?>