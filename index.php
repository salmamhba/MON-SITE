<?php
session_start();
require_once 'functions.php';
$products = getProducts();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>My Scarf</title>
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
                    <li><a href="#produits">Produits</a></li>
                    <li><a href="cart.php">Panier</a></li>
                    <li><a href="#Contact">Contact</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="history.php">Order History</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </section>
        <main>
            <header>
                <img src="imgs\baniere1.jpg" alt="My Scarf">
                <h1>Bienvenue chez My Scarf</h1>
                <p>Découvrez notre collection exclusive d'écharpes et de foulards.</p>
            </header>
            <section id="produits" class="products">
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <img src="imgs\<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                        <h2><?= $product['name'] ?></h2>
                        <p><?= $product['description'] ?></p>
                        <span class="price"><?= $product['price'] ?></span>
                        <button class="add-to-cart" data-id="<?= $product['id'] ?>" data-name="<?= $product['name'] ?>" data-price="<?= $product['price'] ?>">Ajouter au panier</button>
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
    <script src="script.js"></script>
</body>
</html>

