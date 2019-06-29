<?php
   
    if(isset($_POST['submit']))
        {
            require_once("../database.php");

            $code = $_POST['id'];
            $designa = $_POST['design'];
            $descrip = $_POST['descrip'];

            if( (!empty($designa)) && (!empty( $descrip)) )
                {
                    //Modification des données dans la base de donnée
        
                    $req = $bdd->prepare("UPDATE Categorie SET NOM_CAT = ?, DESCRIPTION_CAT = ? WHERE CODE_CAT=?");

                    //$variables = array($designa, $descrip, $code);
    
                    $req->execute(array($designa, $descrip, $code));

                   if($req)
                        {
                            header("location:AfficherCategorie.php");
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



    