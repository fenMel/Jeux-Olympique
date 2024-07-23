<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['form_type']) && $_POST['form_type'] == 'sign_up') {
        $nom_prenom = $_POST['nom_prenom'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // Préparation de la requête pour éviter les injections SQL
        $stmt = $conn->prepare("INSERT INTO users (nom_prenom, username, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nom_prenom, $username, $email, $password);

        if ($stmt->execute()) {
            // Redirection après une inscription réussie
            header("Location: connexion.html");
            exit();
        } else {
            // Redirection en cas d'erreur
            header("Location: erreur.html");
            exit();
        }
    } elseif (isset($_POST['form_type']) && $_POST['form_type'] == 'sign_in') {
        $username_or_email = $_POST['username_or_email'];
        $password = $_POST['password'];

        // Préparation de la requête pour éviter les injections SQL
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username_or_email, $username_or_email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];

                // Redirection après une connexion réussie
                header("Location: index.html");
                exit();
            } else {
                // Redirection en cas de mot de passe incorrect
                header("Location: erreur.html");
                exit();
            }
        } else {
            // Redirection en cas d'utilisateur non trouvé
            header("Location: erreur.html");
            exit();
        }
    }
}

$conn->close();
?>
