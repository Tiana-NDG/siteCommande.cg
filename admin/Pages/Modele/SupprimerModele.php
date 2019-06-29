<?php
    require_once('../database.php');
    $code = $_GET['id'];

    $req = $bdd->prepare('DELETE FROM Modele_Voiture WHERE CodeMod=?');
    $valeur = array($code);
    $req->execute($valeur);

    header('location:AfficherModele.php');
?>