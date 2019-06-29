<?php
   
    if(isset($_POST['submit']))
        {
            require_once("../database.php");

            $code = $_POST['id'];
            $designa = $_POST['designation'];

            if( (!empty($designation)))
                {
                    //Modification des données dans la base de donnée
        
                    $req = $bdd->prepare("UPDATE Marque_Voiture SET DesignationMarq = ?  WHERE CodeMarq=?");

                    $variables = array($designation, $code);
    
                    $req->execute($variables);

                   if($req)
                        {
                            header("location:AfficherMarque.php");
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



    