<?php
    session_start();
    if(!isset($_SESSION['status'])){
        header('location: login.html');
    }

    $products = [
        ['id'=> 1, 'name'=>'Laptop', 'price'=> 80000],
        ['id'=> 2, 'name'=>'Phone', 'price'=> 50000],
        ['id'=> 3, 'name'=>'Mouse', 'price'=> 2500]
    ];

    $_SESSION['products'] = $products;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Products</title>
</head>
<body>

    <h1>Product List</h1>

    <a href="home.php">Back</a> |
    <a href="add_product.php">Add Product</a>

    <br><br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php foreach($products as $product){ ?>

            <tr>
                <td><?=$product['id']?></td>
                <td><?=$product['name']?></td>
                <td><?=$product['price']?></td>
                <td>
                    <a href="edit.php?id=<?=$product['id']?>">EDIT</a>
                </td>
            </tr>

        <?php } ?>

    </table>

</body>
</html>