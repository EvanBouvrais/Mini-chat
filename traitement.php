<?php

    require_once("db.php");

        // var_dump($_POST);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $requete = $mysqlClient->prepare("INSERT INTO messages (user_id, content, created_at, ip_adress) VALUES (:user_id, :content, :created_at, :ip_adress)");
            $requete->execute([
                "user_id"=>$_POST["userId"],
                "content"=>$_POST["content"],
                "created_at"=>$_POST["createdAt"],
                "ip_adress"=>$_POST["ipAdress"],
            ]);
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $requete = $mysqlClient->prepare("INSERT INTO users (username) VALUES (:username)");
            $requete->execute([
                "username"=>$_POST["userName"],
            ]);
        }

header('Location: index.php');
exit;
?>