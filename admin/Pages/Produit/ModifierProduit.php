<?php
	//Connexion à la base de données
	require_once('../database.php');

	//Recupération des variables
		if(isset($_POST['submit']))
			{
                $code = $_POST['code'];

				$designation = $_POST['designation'];
			
				$prix = $_POST['prix'];
				
				$quantite = $_POST['quantite'];

				$modele = $_POST['modele'];
				
                $Photo = $_FILES['photo']['name'];
                
               if((!empty($code)) && (!empty($designation)) && (!empty( $prix)) && (!empty( $quantite)) && (!empty($modele)) && (!empty($Photo)))
                    {
                        $modifier = $bdd->prepare('UPDATE Pieces SET CodePro =?, DesignationPro = ?, PUPro = ?, QtePro = ?, CodeMod= ?, PhotoPro =?  WHERE CodePro =?');

                        $variables = array($code, $designation, $prix, $quantite, $Photo, $modele);

                        $modifier->execute($variables);

                        //header('location: AfficherProduit.php');
                    }
                else{
                        echo 'S\'il vous plait veuillez remplir les champs vides';
                        //header('location: EditerProduit.php');
                    }
                    
            }
?>