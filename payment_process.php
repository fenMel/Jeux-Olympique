<?php
include 'database.php';

session_start();

$name = htmlspecialchars($_POST['name']);
$cardNumber = htmlspecialchars($_POST['cardNumber']);
$expiryDate = htmlspecialchars($_POST['expiryDate']);
$cvv = htmlspecialchars($_POST['cvv']);
$email=$_SESSION['email'];

// Validation des champs
if (empty($name) || empty($cardNumber) || empty($expiryDate) || empty($cvv)) {
    echo "<p>Veuillez remplir tous les champs</p>";
    echo '<script type="text/javascript">
            setTimeout(function() {
                window.location.href = "index.php";
            }, 3000);
          </script>';
    exit();
}
if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
    echo "<p>Nom invalide</p>";
    echo '<script type="text/javascript">
            setTimeout(function() {
                window.location.href = "index.php";
            }, 3000);
          </script>';
    exit();
}
if (!preg_match("/^[0-9]{16}$/", $cardNumber)) {
    echo "<p>Numéro de carte invalide</p>";
    echo '<script type="text/javascript">
            setTimeout(function() {
                window.location.href = "index.php";
            }, 3000);
          </script>';
    exit();
}
if (!preg_match("/^(0[1-9]|1[0-2])\/[0-9]{2}$/", $expiryDate)) {
    echo "<p>Date d'expiration invalide</p>";
    echo '<script type="text/javascript">
            setTimeout(function() {
                window.location.href = "index.php";
            }, 3000);
          </script>';
    exit();
}
if (!preg_match("/^[0-9]{3,4}$/", $cvv)) {
    echo "<p>CVV invalide</p>";
    echo '<script type="text/javascript">
            setTimeout(function() {
                window.location.href = "index.php";
            }, 3000);
          </script>';
    exit();
}

// Enregistrer les informations de paiement dans la base de données
$sql = "INSERT INTO credit_cards (name, cardNumber, expiryDate, cvv, user_email) VALUES ('$name', '$cardNumber', '$expiryDate', '$cvv', '$email')";

if ($conn->query($sql) === TRUE) {
    // Message et redirection après un paiement réussi
    echo "<p>Paiement effectué avec succès</p>";
    echo '<script type="text/javascript">
            setTimeout(function() {
                window.location.href = "index.php";
            }, 3000);
          </script>';
    exit();
} else {
    // Message et redirection en cas d'erreur de base de données
    echo "<p>Erreur lors de l'enregistrement du paiement : " . $conn->error . "</p>";
    echo '<script type="text/javascript">
            setTimeout(function() {
                window.location.href = "index.php";
            }, 3000);
          </script>';
    exit();
}

$conn->close();
?>
