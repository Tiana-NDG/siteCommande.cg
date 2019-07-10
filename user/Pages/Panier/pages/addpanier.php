<?php
    session_start();
    if(isset($_SESSION['panier'])){
        $panier = $_SESSION['panier'];
    }
    else{
        $panier = array();
    }

    $index = count($panier);
    $panier[$index]['ref'] = $_POST['ref'];
    $panier[$index]['designation'] = $_POST['designation'];
    $panier[$index]['prix'] = $_POST['prix'];
    $panier[$index]['quantite'] = $_POST['quantite'];

    $_SESSION['panier'] = $panier ;

    header('location: afficherPanier.php?panier=1');
?>