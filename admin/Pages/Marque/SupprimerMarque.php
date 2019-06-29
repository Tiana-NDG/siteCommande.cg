<?php
    require_once('../database.php');
    $code = $_GET['id'];

    $req = $bdd->prepare('DELETE FROM Marque_Voiture WHERE CodeMarq=?');
    $valeur = array($code);
    $req->execute($valeur);

    header('location:AfficherMarque.php');
?>