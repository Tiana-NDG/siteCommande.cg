<?php
    //connexion à la base de données
    try {
        $db = new PDO('mysql:host=localhost; dbname=commande_des_voitures; charset=utf8', 'root', '');

        $db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    } catch (PDOExeption $e) {
    die('Impossible de se connecter à la base de données' .$e->getMessage());
    }
