<?php
require_once 'config.php';

function registerUser($username, $password, $email) {
    global $pdo;
    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$username, password_hash($password, PASSWORD_DEFAULT), $email]);
}

function loginUser($username, $password) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute([$username]); 
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        return true;
    }
    return false;
}

function getProducts() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM products");
    return $stmt->fetchAll();
}

function addToCart($id, $name, $price, $image) {
    if (!isset($name) || !isset($price)) {
        echo "Product details are missing.";
        return;
    }
    $_SESSION['cart'][] = ['id' => $id, 'name' => $name, 'price' => $price, 'image' => $image, 'quantity' => 1];
}




function checkout() {
    global $pdo;
    if (!isset($_SESSION['user_id'])) {
        echo "Please log in to checkout.";
        return;
    }
    foreach ($_SESSION['cart'] as $item) {
        $sql = "INSERT INTO orders (user_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$_SESSION['user_id'], $item['id'], $item['quantity']]);
    }
    unset($_SESSION['cart']);
}

?>

