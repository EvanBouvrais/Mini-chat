<?php

session_start();

require_once("connexion.php");

// 1. Vérifie que le formulaire a été envoyé
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 2. Récupère le pseudonyme saisi
    $username = trim($_POST['username'] ?? '');

    // 3. Vérifie que le pseudonyme n'est pas vide
    if ($username === '') {
        header('Location: index.php');
        exit;
    }

    // 4. Recherche le pseudonyme dans la base de données
    $requete = $mysqlClient->prepare(
        "SELECT id, username FROM users WHERE username = :username"
    );

    $requete->execute([
        'username' => $username
    ]);

    $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

    // 5. Si l'utilisateur n'existe pas, on le crée
    if (!$utilisateur) {

        $requete = $mysqlClient->prepare(
            "INSERT INTO users (username) VALUES (:username)"
        );

        $requete->execute([
            'username' => $username
        ]);

        // Récupère son identifiant après l'insertion
        $utilisateur = [
            'id' => $mysqlClient->lastInsertId(),
            'username' => $username
        ];
    }

    // 6. Enregistre l'utilisateur dans la session PHP
    session_regenerate_id(true);

    $_SESSION['user_id'] = $utilisateur['id'];
    $_SESSION['username'] = $utilisateur['username'];
}

// 7. Retourne sur la page du chat
header('Location: index.php');
exit;