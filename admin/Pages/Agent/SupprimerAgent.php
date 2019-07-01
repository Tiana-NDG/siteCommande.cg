<?php
    require_once('../database.php');
    $code = $_GET['id'];

    $req = $bdd->prepare('DELETE FROM Agent WHERE CodeAg=?');
    $valeur = array($code);
    $req->execute($valeur);

    header('location:AfficherAgent.php');
?>