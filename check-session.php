<?php
// check-session.php
include 'database.php';
session_start();

header('Content-Type: application/json');

$response = array('isLoggedIn' => false);

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Vérifiez que l'utilisateur existe dans la base de données
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
    $stmt->execute(['id' => $userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $response['isLoggedIn'] = true;
        $response['user_id'] = $user['id'];
        $response['username'] = $user['username'];
        $response['nom_prenom'] = $user['nom_prenom'];
        $response['email'] = $user['email'];
    }
}

echo json_encode($response);
?>
