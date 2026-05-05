<?php
session_start();

$product = [
    'id'=>$_POST['id'],
    'name'=>$_POST['name'],
    'price'=>$_POST['price']
];

$_SESSION['products'][] = $product;

header('location: ../view/product_list.php');
?>