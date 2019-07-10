<?php
    require_once('database.php');
    //require_once('ajout_panier.php');
    $produits = $db->prepare('SELECT * FROM produits');
    $produits->execute();
    //var_dump($produits->fetchAll(PDO::FETCH_OBJ));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../styles/css/swiper.min.css">
    <link rel="stylesheet" href="../styles/css/style.css">

    <title>Boutique</title>
</head>
<body>
    <?php foreach ($produits as $produit): ?>
        <p>
            <div class="imgBox">
                <a href=""><img src="../../admin/styles/images/<?php echo $produit['PHOTO']; ?>" alt="" width="100" heigth="100"></a>
            </div>
            <div class="details">
                <a href="marque.php?id=<?php echo $produit['ID']; /*Ici en cliquant on te redirige sur une page où il y aura que les information sur la marque cliquée*/?>"><span><?php echo $produit['DESIGNATION']; ?></span></a><br>
                    <?php echo $produit['DESCRIPTIONS']; ?><br>
                    <?php echo number_format($produit['PRIX'], 2, ',', ''); ?> FCFA <br> 
                <div class="">
                    <a href="ajout_panier.php?id=<?= $produit['ID']; ?>">add</a>
                </div>
                <div class="Gift">
                    <form action="addpanier.php" method="post">
                        <input type="hidden" name="ref" value="<?php echo $produit['ID'];?>">
                        <input type="hidden" name="designation" value="<?= $produit['DESIGNATION']; ?>">
                        <input type="hidden" name="prix" value="<?php echo number_format($produit['PRIX'], 2, ',', ''); ?>">
                        <input type="text" name="quantite" size="5" value="1">
                        <input type="submit" value="Gift">
                    </form>
                </div>
            </div>
        </p>
        
    <?php endforeach ?>