<!-- checkout.php -->
<?php
session_start();
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    checkout();
    header('Location: thankyou.php'); // Redirect to the thank you page
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>My Scarf - Checkout</title>
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
        <main class="small-container card-page">
            <table>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Sous-total</th>
                </tr>
                <?php 
                $total = 0;
                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                    <?php 
                    $i = 1;
                    foreach ($_SESSION['cart'] as $item): 
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td>
                                <div class="card-info">
                                    <img src="imgs\<?= $i ?>.jpg">
                                    <div>
                                        <p><?= $item['name'] ?></p>
                                        <small>Prix : <?= $item['price'] ?> DH</small>
                                    </div>
                                </div>
                            </td>
                            <td><?= $item['quantity'] ?></td>
                            <td><?= $subtotal ?> DH</td>
                        </tr>
                    <?php 
                    $i++;
                    endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">Panier vide</td>
                    </tr>
                <?php endif; ?>
            </table>
            <div class="total-price">
                <h2>Total: <?= $total ?> DH</h2>
            </div>
            <form method="post">
                <button type="submit" class="btn-checkout">Payer</button>
            </form>
            <p></p>
        </main>
    </div>
    <footer>
        <div id="Contact"  class="contact">
            <h2>Contactez-nous</h2>
            <p>Téléphone : +212648902058</p>
            <p>Email : myscarf@gmail.com</p>
        </div>
        <p>© 2023 My Scarf. Tous droits réservés.</p>
    </footer>
    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>
</body>
</html>

