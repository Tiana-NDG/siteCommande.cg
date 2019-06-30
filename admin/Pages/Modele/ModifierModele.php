<?php
    if(isset($_POST['submit']))
        {
            require_once("../database.php");

            $code = $_POST['id'];
            $designation = $_POST['designation'];
            $marque = $_POST['marque'];

            if( (!empty($designation)) && (!empty( $marque)) )
                {
                    //Modification des données dans la base de donnée
        
                    $req = $bdd->prepare("UPDATE Modele_Voiture SET DesignationMod = ?, CodeMarq= ? WHERE CodeMod=?");

                    $variables = array($designation, $marque, $code);
    
                    $req->execute($variables);

                   if($req)
                        {
                            header("location:AfficherModele.php");
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



    