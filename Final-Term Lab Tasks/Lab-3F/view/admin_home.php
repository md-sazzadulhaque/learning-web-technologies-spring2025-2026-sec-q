<?php
session_start();

if(!isset($_SESSION['products'])){

    $_SESSION['products'] = [
        ['id'=>1,'name'=>'Laptop','price'=>800],
        ['id'=>2,'name'=>'Phone','price'=>500],
        ['id'=>3,'name'=>'Mouse','price'=>50]
    ];
}

$products = $_SESSION['products'];


// ADD PRODUCT
if(isset($_POST['add'])){

    $products[] = [
        'id'    => $_POST['id'],
        'name'  => $_POST['name'],
        'price' => $_POST['price']
    ];

    $_SESSION['products'] = $products;

    header("location: admin_home.php");
}


// DELETE PRODUCT
if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    for($i=0; $i<count($products); $i++){

        if($products[$i]['id'] == $id){
            unset($products[$i]);
        }
    }

    $_SESSION['products'] = array_values($products);

    header("location: admin_home.php");
}


// EDIT PRODUCT
if(isset($_POST['save'])){

    for($i=0; $i<count($products); $i++){

        if($products[$i]['id'] == $_POST['id']){

            $products[$i]['name']  = $_POST['name'];
            $products[$i]['price'] = $_POST['price'];
        }
    }

    $_SESSION['products'] = $products;

    header("location: admin_home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Home</title>
</head>
<body>

    <h1 align="center">Admin Product Management</h1>\

    <table border="1" align="center" cellpadding="10">

        <form method="post">

        <tr>
            <th colspan="2">Add Product</th>
        </tr>

        <tr>
            <td>ID</td>
            <td><input type="text" name="id"></td>
        </tr>

        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>

        <tr>
            <td>Price</td>
            <td><input type="text" name="price"></td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="add" value="Add Product">
            </td>
        </tr>

        </form>

    </table>

    <br><br>


    <table border="1" align="center" cellpadding="10">

        <tr>
            <th colspan="4">Product List</th>
        </tr>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php foreach($products as $product){ ?>

        <tr>

        <form method="post">

        <td>
            <input type="text" name="id" readonly value="<?=$product['id']?>">
        </td>

        <td>
            <input type="text" name="name" value="<?=$product['name']?>">
        </td>

        <td>
            <input type="text" name="price" value="<?=$product['price']?>">
        </td>

        <td>
            <input type="submit" name="save" value="Save">
            <a href="admin_home.php?delete=<?=$product['id']?>">DELETE</a>
        </td>

        </form>

        </tr>

        <?php } ?>

    </table>

</body>
</html>