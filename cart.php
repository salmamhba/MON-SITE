<!-- cart.php -->
<?php
session_start();
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove'])) {
        $key = array_search($_POST['remove'], array_column($_SESSION['cart'], 'id'));
        unset($_SESSION['cart'][$key]);
    } else {
        foreach ($_POST['quantity'] as $id => $quantity) {
            $key = array_search($id, array_column($_SESSION['cart'], 'id'));
            $_SESSION['cart'][$key]['quantity'] = $quantity;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>My Scarf - Cart</title>
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
                <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                    <form method="post">
                        <?php 
                        $i = 1;
                        foreach ($_SESSION['cart'] as $item): ?>
                            <tr>
                                <td>
                                    <div class="card-info">
                                        <img src="imgs\<?= $i ?>.jpg">
                                        <div>
                                            <p><?= $item['name'] ?></p>
                                            <small>Prix : <?= $item['price'] ?> DH</small>
                                            <br>
                                            <button type="submit" name="remove" value="<?= $item['id'] ?>" class="btn-remove">Retirer</button>
                                        </div>
                                    </div>
                                </td>
                                <td><input type="number" name="quantity[<?= $item['id'] ?>]" value="<?= $item['quantity'] ?>"></td>
                                <td><?= $item['price'] * $item['quantity'] ?> DH</td>
                            </tr>
                        <?php 
                        $i++;
                        endforeach; ?>
                        <tr>
                            <td colspan="3"><button type="submit" class="btn-update">Appliquer</button></td>
                        </tr>
                    </form>
                    <tr>
                        <td colspan="3"><a href="checkout.php" class="btn-checkout">Passer à la caisse</a></td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td colspan="3">Panier vide</td>
                    </tr>
                <?php endif; ?>
            </table>
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

