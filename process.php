<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de Contact</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .confirmation-container {
            text-align: center;
            margin-top: 50px;
        }
        .success-message {
            color: green;
            font-weight: bold;
            font-size: 16px;
            margin-top: 20px;
        }
        .error-message {
            color: red;
            font-weight: bold;
            font-size: 16px;
            margin-top: 20px;
        }
        .confirmation-image {
            display: block;
            margin: 0 auto;
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>

<?php
include 'database.php';

$nom = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['phone'];
$message = $_POST['message'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contact_db (name, email, phone, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nom, $email, $telephone, $message);

// Execute the query
if ($stmt->execute()) {
   echo '<script type="text/javascript">
            setTimeout(function() {
                window.location.href = "validation.html";
            }, 1); // Redirect after 10 seconds
          </script>';

} else {
    echo '<div class="confirmation-container">';
  echo '<script type="text/javascript">
            setTimeout(function() {
                window.location.href = "erreur.html";
            }, 1); // Redirect after 10 seconds
          </script>';
     
}

$stmt->close();
$conn->close();
?>

</body>
</html>