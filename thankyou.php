<!-- thankyou.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Thank You</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        #thankyou {
            padding: 30px;
            background-color: #ffffff;
            color: #333333;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        #thankyou h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        #thankyou p {
            font-size: 1.2em;
        }

        #home-link {
            display: inline-block;
            color: #ffffff;
            background-color: #333333;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="thankyou">
            <h1>Nous vous remercions de votre commande!</h1>
            <p>Votre commande a été reçue et est maintenant en cours de traitement. Nous apprécions votre entreprise!</p>
            <a href="index.php" id="home-link">Retour à la page d'accueil</a>
        </div>
    </div>
</body>
</html>

