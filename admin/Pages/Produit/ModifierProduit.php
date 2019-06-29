<?php
	//Connexion à la base de données
	require_once('../database.php');

	//Recupération des variables
		if(isset($_POST['submit']))
			{
				$design = $_POST['design'];
			
				$prix = $_POST['prix'];
				
				$qt = $_POST['quantite'];

				$promo = $_POST['promo'];

				$dispo = $_POST['dispo'];

				//$select = $_POST['selection'];

				$cat = $_POST['cat'];
				
                $Photo = $_FILES['photo']['name'];
                
                if($Photo =="")
                    {
                        $modifier = $bdd->prepare('UPDATE Produits SET DESIGNATION_PRO = ?, QUANTITE_PRO = ?, 
                        PRIX_PRO = ?, DISPONIBILITE_PRO = ?, PROMOTION_PRO = ?, CODE_CAT = ?  WHERE CODE_PRO =?');

                        $variables = array($design, $qt, $prix, $dispo, $promo, $cat );

                        $modifier->execute($variables);

                        //header('location: AfficherProduit.php');
                    }
                elseif((!empty($design)) && (!empty( $prix)) && (!empty( $qt)) && (!empty($promo)) && (!empty($Photo)) && (!empty($dispo)))
                    {
                        $modifier = $bdd->prepare('UPDATE Produits SET DESIGNATION_PRO = ?, QUANTITE_PRO = ?, 
                        PRIX_PRO = ?, PHOTO_PRO = ?, DISPONIBILITE_PRO = ?, PROMOTION_PRO = ?, CODE_CAT = ?  WHERE CODE_PRO =?');

                        $variables = array($design, $qt, $prix, $dispo, $promo, $cat );

                        $modifier->execute($variables);

                        header('location: AfficherProduit.php');
                    }
                else{
                        echo 'S\'il vous plait veuillez remplir les champs vides';
                        header('location: EditerProduit.php');
                    }
                    
            }
?>