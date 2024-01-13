<?php
session_start();
require_once 'functions.php';

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];

addToCart($id, $name, $price, $image);

echo 'Product added to cart';
?>

