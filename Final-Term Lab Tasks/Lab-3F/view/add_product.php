<?php 
    session_start();
    if(!isset($_SESSION['status'])){
        header('location: login.html');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Product</title>
</head>
<body>

    <h1>Add Product</h1>

    <form method="post" action="../controller/store.php">
        <table>
            <tr>
                <td>ID:</td>
                <td><input type="text" name="id" value=""></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" value=""></td>
            </tr>
            <tr>
                <td>Price:</td>
                <td><input type="text" name="price" value=""></td>
            </tr>
        </table>

        <input type="submit" name="submit" value="Add">

    </form>

</body>
</html>