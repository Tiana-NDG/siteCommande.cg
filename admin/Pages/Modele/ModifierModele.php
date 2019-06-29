<?php
    if(isset($_POST['submit']))
        {
            require_once("../database.php");

            $code = $_POST['id'];
            $designation = $_POST['designation'];
            $modele = $_POST['modele'];

            if( (!empty($designation)) && (!empty( $modele)) )
                {
                    //Modification des données dans la base de donnée
        
                    $req = $bdd->prepare("UPDATE Modele_Voiture SET DesignationMod = ?, CodeMarq= ? WHERE CodeMod=?");

                    $variables = array($designation, $modele, $code);
    
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



    