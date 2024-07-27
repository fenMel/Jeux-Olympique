<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier votre mot de passe</title>
    <link rel="stylesheet" href="css/modifi_mdp.css">
</head>
<body>
    <div class="container">
        <div class="mdp_m">
            <h1>Modifier votre mot de passe</h1>
        </div>
        <!-- Affichage des messages d'erreur et de succès -->
        <form action="change-p.php" method="post">
            <div class="form-container">
                <div class="mdp">
                    <div class="mdp_actual">
                        <label for="Amdp">Votre mot de passe actuel :</label>
                        <input type="password" id="Amdp" name="Amdp" placeholder="Votre mot de passe actuel" required>
                    </div>
                    <div class="mdp_nv">
                        <label for="Nmdp">Nouveau mot de passe :</label>
                        <input type="password" id="Nmdp" name="Nmdp" placeholder="Nouveau mot de passe" required>
                    </div>
                    <div class="mdp_nv_confirm">
                        <label for="CNmdp">Confirmer votre mot de passe :</label>
                        <input type="password" id="CNmdp" name="CNmdp" placeholder="Confirmer votre mot de passe" required>
                    </div>
                    <input type="submit" value="Soumettre">
                </div>
                <div>
                    <img src="img/security.gif" alt="Image de sécurité">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
