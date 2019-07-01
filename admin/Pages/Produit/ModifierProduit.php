<?php
    require_once("../database.php");

    if(isset($_POST['submit'])){
    
            $code = $_POST['id'];
            $designation = $_POST['designation'];
			$prix = $_POST['prix'];
			$quantite = $_POST['quantite'];
			$modele = $_POST['modele'];
            $Photo = $_FILES['photo']['name'];

            if($Photo==""){
                $req = $bdd->prepare("UPDATE Pieces SET DesignationPro = ?, PUPro = ?, QtePro = ?, CodeMod= ? WHERE CodePro=?");
                $variables = array($designation, $prix, $quantite, $modele, $code);
                $req->execute($variables);
            }
            elseif( (!empty($designation)) && (!empty( $prix)) && (!empty($quantite)) && (!empty($modele)) && (!empty($Photo)) ){
                    //Modification des données dans la base de donnée

                    $file_tmp_name = $_FILES['photo']['tmp_name']; //Création du nom temporaire de la photo
		            move_uploaded_file($file_tmp_name, "./../../../styles/images/$Photo"); //Emplacement du fichier
        
                    $req = $bdd->prepare("UPDATE Pieces SET DesignationPro = ?, PUPro = ?, QtePro = ?, PhotoPro = ?, CodeMod= ? WHERE CodePro=?");
                    $variables = array($designation, $prix, $quantite, $Photo, $modele, $code);
                    $req->execute($variables);

                   if($req){
                        //header("location:AfficherProduit.php");
                    }else{
                        echo "Echec";
                    } 
            }else{
                 echo '<p class= "spacer">S.V.P veuillez renseigner tous les champs</p>';
            }
        }
?>