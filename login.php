<?php
session_start();
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (loginUser($username, $password)) {
        header('Location: index.php');
        exit;
    } else {
        $message = 'Invalid username or password!';
    }
} else {
    $message = '';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>My Scarf - Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
</style>
</head>
<body>
    <div class="col-2">
        <div class="form-container" style="width: 1000px;">
            <div class="form-btn">
                <span onclick="Login()"> Login  </span>
                <hr id="Indicator">
            </div>
            <form id="Loginform" method="post">
                <input type="text" name="username" placeholder="Nom d'utilisateur"><br>
                <input type="password" name="password" placeholder="Mot de passe"><br>
                <button class="btn" type="submit">Login</button><br>
                <p><?= $message ?></p>
                <a href="">Mot de passe oublié </a>
            </form>
        </div>
    </div>
</body>
</html>

