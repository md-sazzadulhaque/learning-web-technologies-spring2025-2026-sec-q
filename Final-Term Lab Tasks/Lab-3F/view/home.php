<?php
    session_start();
    if(!isset($_SESSION['status'])){
        header('location: login.html');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
</head>
<body>

    <h1>Home Page</h1>

    <?php
        if($_SESSION['role'] == "admin"){
    ?>
        <a href="product_list.php">Manage Products</a>
    <?php
    }
    else{
    ?>
        <a href="user_product.php">View Products</a>
    <?php
    }
    ?>

    <br><br>
    <a href="../controller/logout.php">Logout</a>

</body>
</html>