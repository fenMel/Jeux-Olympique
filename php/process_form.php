<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['form_type']) && $_POST['form_type'] == 'sign_up') {
        $nom_prenom = $_POST['nom_prenom'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (nom_prenom, username, email, password) VALUES ('$nom_prenom', '$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['form_type']) && $_POST['form_type'] == 'sign_in') {
        $username_or_email = $_POST['username_or_email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username_or_email' OR email='$username_or_email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                echo "Login successful";
            } else {
                echo "Invalid password";
            }
        } else {
            echo "No user found with that username or email";
        }
    }
}

$conn->close();
?>
