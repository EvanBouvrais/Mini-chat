<?php

    try {
        $mysqlClient = new PDO('mysql:host=localhost;dbname=mini-chat', 'root', '');
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

?>

    