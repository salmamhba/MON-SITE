<?php
session_start();
require_once 'functions.php';

if (!isset($_SESSION['user_id'])) {
    echo "Please log in to view your order history.";
    exit;
}

$userId = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM orders WHERE user_id=?");
$stmt->execute([$userId]); 
$orders = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>My Scarf - Order History</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php"> <img src="imgs\logo.png" width="70px" ></a>
        </div>
        <h1 class="site-name">My Scarf</h1>
        <p>Explorez l'art de l'élégance - Un mélange délicat de douceur et de raffinement dans notre monde d'écharpes</p>
    </header>
    <div class="background">
        <section class="home">
            <nav class="nav-links">
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="index.php#produits">Produits</a></li>
                    <li><a href="cart.php">Panier</a></li>
                    <li><a href="#Contact">Contact</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="history.php">Order History</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </section>
        <main>
            <header>
                <h1>Your Order History</h1>
            </header>
            <section id="history" class="history">
                <?php foreach ($orders as $order): ?>
                    <div class="order-item">
                        <h2>Order ID: <?= $order['id'] ?></h2>
                        <p>Product ID: <?= $order['product_id'] ?></p>
                        <p>Quantity: <?= $order['quantity'] ?></p>
                    </div>
                <?php endforeach; ?>
            </section>
        </main>
    </div>
    <footer>
        <div id="Contact" class="contact">
            <h2>Contactez-nous</h2>
            <p>Téléphone : +212648902058</p>
            <p>Email : myscarf@gmail.com</p>
        </div>
        <p>© 2023 My Scarf. Tous droits réservés.</p>
    </footer>
</body>
</html>

