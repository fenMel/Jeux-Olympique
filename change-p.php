<?php
session_start();
include "database.php";

// Assurez-vous de bien récupérer les entrées utilisateur
$email = $_SESSION['email'];
$ancienMdp = $_POST['Amdp'];
$nouveauMdp = $_POST['Nmdp'];
$confirmationMdp = $_POST['CNmdp'];

if (!empty($ancienMdp) && !empty($nouveauMdp) && !empty($confirmationMdp)) {
    if ($nouveauMdp === $confirmationMdp) {
        // Préparer la requête pour récupérer le mot de passe hashé de l'utilisateur
        $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();
        $stmt->close();

        // Vérifier que l'ancien mot de passe saisi correspond au mot de passe hashé en base de données
        if (password_verify($ancienMdp, $hashedPassword)) {
            // Hacher le nouveau mot de passe
            $hashedNewPassword = password_hash($nouveauMdp, PASSWORD_BCRYPT);

            // Préparer la requête pour mettre à jour le mot de passe
            $updateStmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            $updateStmt->bind_param("ss", $hashedNewPassword, $email);
            $updateStmt->execute();
            $updateStmt->close();

            echo "<div style='text-align: center;'>Mot de passe mis à jour avec succès.</div>";
             echo '<script type="text/javascript">
            setTimeout(function() {
                window.location.href = "parametre.html";
            }, 2000); // Redirect after 10 seconds
          </script>';
           
        } else {
            echo "<div style='text-align: center;'>L'ancien mot de passe est incorrect.</div>";
             echo '<script type="text/javascript">
            setTimeout(function() {
                window.location.href = "parametre.html";
            }, 2000); // Redirect after 10 seconds
          </script>';
        }
    } else {
        echo "<div style='text-align: center;'>Les nouveaux mots de passe ne correspondent pas.</div>";
         echo '<script type="text/javascript">
            setTimeout(function() {
                window.location.href = "parametre.html";
            }, 2000); // Redirect after 10 seconds
          </script>';
    }
} else {
    echo "<div style='text-align: center;'>Veuillez remplir tous les champs.</div>";
     echo '<script type="text/javascript">
            setTimeout(function() {
                window.location.href = "parametre.html";
            }, 2000); // Redirect after 10 seconds
          </script>';
}

$conn->close();
?>
