<?php
    session_start();

    $index = $_GET['index'];
    $panier = $_SESSION['panier'];

    //on supprime l'élément du tableau en faisant:
    unset($panier[$index]);

   //Ensuite on le ramène dans la session
   $_SESSION['panier'] =  $panier;
    header('location: afficherPanier.php?panier=1');
?>