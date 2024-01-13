<?php
session_start();
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    registerUser($username, $password, $email);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>My Scarf - Register</title>
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
            <span onclick="register()"> Register  </span>
            <form id="Regform" method="post">
                <input type="text" name="username" placeholder="Nom d'utilisateur"><br>
                <input type="email" name="email" placeholder="Email"><br>
                <input type="password" name="password" placeholder="Mot de passe"><br>
                <button class="btn" type="submit">Register</button><br>
            </form>
        </div>
    </div>
</body>
</html>

