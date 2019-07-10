<?php
    session_start();
    $panier = $_SESSION['panier'];
?>

<body>
    <form action="" method="POST">
        <div class="wrapper">
            <div class="commander">
                <ul>
                    <li>Etes-vous sûre de vouloir commander?</li>
                    <li><a href="#">Bon de commande</a></li>
                </ul>
            </div>
            <div class="contenu_de_commande">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Reference</th>
                            <th>Designation</th>
                            <th>PRIX UNITAIRE</th>
                            <th>QUANTITE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                            $total = 0;
                            for ($i=0; $i < count($panier); $i++) { 

                                $total = $total+ $panier[$i]['prix']*$panier[$i]['quantite'];
                        ?>
                                <tr>
                                    <td><?php echo ($panier[$i]['ref']) ;?></td>
                                    <td><?php echo ($panier[$i]['designation']) ;?></td>
                                    <td><?php echo ($panier[$i]['prix']) ;?></td>
                                    <td><?php echo ($panier[$i]['quantite']) ;?></td>
                                    <td><a href="supprimerPanier.php?index=<?=$i;?>">X</a></td>
                                </tr>

                        <?php    
                            }
                       ?>
                       <tr>
                           <td colspan="3">Total:</td>
                           <td><?php echo  $total ;?></td>
                       </tr>
                    </tbody>
                  
                </table>
            </div>
        </div>
    </form>
</body>
</html>