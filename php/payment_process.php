<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['form_type']) && $_POST['form_type'] == 'payment') {
        $name = htmlspecialchars($_POST['name']);
        $cardNumber = htmlspecialchars($_POST['cardNumber']);
        $expiryDate = htmlspecialchars($_POST['expiryDate']);
        $cvv = htmlspecialchars($_POST['cvv']);

        // Validation des champs
        if (empty($name) || empty($cardNumber) || empty($expiryDate) || empty($cvv)) {
            header("Location: error.php?message=" . urlencode("Veuillez remplir tous les champs"));
            exit();
        }
        if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
            header("Location: error.php?message=" . urlencode("Nom invalide"));
            exit();
        }
        if (!preg_match("/^[0-9]{16}$/", $cardNumber)) {
            header("Location: error.php?message=" . urlencode("Numéro de carte invalide"));
            exit();
        }
        if (!preg_match("/^(0[1-9]|1[0-2])\/[0-9]{2}$/", $expiryDate)) {
            header("Location: error.php?message=" . urlencode("Date d'expiration invalide"));
            exit();
        }
        if (!preg_match("/^[0-9]{3,4}$/", $cvv)) {
            header("Location: error.php?message=" . urlencode("CVV invalide"));
            exit();
        }

        // Enregistrer les informations de paiement dans la base de données
        $sql = "INSERT INTO credit_cards (name, cardNumber, expiryDate, cvv) VALUES ('$name', '$cardNumber', '$expiryDate', '$cvv')";

        if ($conn->query($sql) === TRUE) {
            // Redirection après un paiement réussi
            header("Location: success.php?message=" . urlencode("Paiement effectué avec succès"));
            exit();
        } else {
            // Redirection en cas d'erreur de base de données
            header("Location: error.php?message=" . urlencode("Erreur lors de l'enregistrement du paiement : " . $conn->error));
            exit();
        }
    }
}

$conn->close();
?>
