<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Méthode non autorisée.');
}

$username = $_POST['username'] ?? '';
if (!is_string($username)) {
    http_response_code(400);
    exit('Pseudonyme invalide.');
}

$username = trim($username);
if ($username === '' || mb_strlen($username) > 50) {
    http_response_code(400);
    exit('Le pseudonyme doit contenir entre 1 et 50 caractères.');
}

try {
    require __DIR__ . '/db.php';

    $stmt = $mysqlClient->prepare(
        'INSERT INTO users (username) VALUES (:username)
         ON DUPLICATE KEY UPDATE id = LAST_INSERT_ID(id)'
    );
    $stmt->execute(['username' => $username]);

    $_SESSION['user_id'] = (int) $mysqlClient->lastInsertId();
    $_SESSION['username'] = $username;

    header('Location: index.php');
    exit;
} catch (PDOException $e) {
    error_log($e->getMessage());
    http_response_code(500);
    exit('Connexion impossible. Vérifiez que MySQL est démarré, que la base mini-chat existe et que son schéma est importé.');
}
