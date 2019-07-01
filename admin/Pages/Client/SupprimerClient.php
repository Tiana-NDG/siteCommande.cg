<?php
    require_once('../database.php');
    $code = $_GET['id'];

    $req = $bdd->prepare('DELETE FROM Client WHERE CodeCli=?');
    $valeur = array($code);
    $req->execute($valeur);

    header('location:AfficherClient.php');
?>