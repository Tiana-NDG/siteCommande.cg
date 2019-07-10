<?php
    try
        {
            $bdd = new pdo('mysql:host=localhost; dbname=Gestion_des_Commandes; charset=utf8', 'root', '');
            $bdd->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }

    catch(PDOExeption $e)
        {
            die('Erreur de connexion:' .$e->getMesssage());
        }