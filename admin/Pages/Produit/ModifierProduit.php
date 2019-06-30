<?php
    if(isset($_POST['submit']))
        {
            require_once("../database.php");

            $code = $_POST['id'];

            $designation = $_POST['designation'];
			
			$prix = $_POST['prix'];
				
			$quantite = $_POST['quantite'];

			$modele = $_POST['modele'];
				
            $Photo = $_FILES['photo']['name'];

            if( (!empty($designation)) && (!empty( $prix)) && (!empty($quantite)) && (!empty($modele)) && (!empty($Photo)) )
                {
                    //Modification des données dans la base de donnée
        
                    $req = $bdd->prepare("UPDATE Pieces SET DesignationPro = ?, PUPro = ?, QtePro = ?, PhotoPro = ?, CodeMod= ? WHERE CodePro=?");

                    $variables = array($designation, $prix, $quantite, $Photo, $modele, $code);
    
                    $req->execute($variables);

                   if($req)
                        {
                            header("location:AfficherProduit.php");
                        }
                    else
                        {
                            echo "Echec";
                        } 
                }
            else
                {
                    echo '<p class= "spacer">S.V.P veuillez renseigner tous les champs</p>';
                }
        }
?>