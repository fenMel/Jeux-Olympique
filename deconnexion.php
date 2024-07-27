<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Times New Roman', Times, serif;
            background-color: white;
        }

        .message {
            box-sizing: border-box;
            text-align: justify;
            padding: 20px;
            border: none;
        }

        h3 {
            color: blue;
            font-size: 50px;
        }

        P {
            font-size: 30px;
        }

        .image {
            width: 340px;
            
        }

        .container {
            display: flex;
        }

        .titre {
            position: relative;
            box-sizing: border-box;
            border: none;
            bottom: 120px;
        }
        .deconnexion{
            display: flex;
            top: 200px;

        }
    </style>
</head>

<body>

    <div class="container">
        <div class="deconnexion">
            <div class="titre">
                <h1>Déconnexion...</h1>
            </div>
            <div>
                <img src="deconnexion.avif" alt="" class="image">
            </div>
            <div class="message">
                <h3>MERCI.</h3>
                <p>Nous espérons vous revoir très bientôt...</p>
                <p>Vous allez être redirigé vers la page principale dans quelques instants...</p>
            </div>
            <?php
                session_start();

                // Supprimer toutes les variables de session
                $_SESSION = array();
                session_destroy();
            ?>
        </div>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 3000);
    </script>
</body>

</html>