<?php
   
    if(isset($_POST['submit']))
        {

            $designation = $_POST['designation'];

            if(!empty($designation))
                {
                    //Enregistrement des données dans la base de donnée

                    require_once("../database.php");
        
                    $req = $bdd->prepare('INSERT INTO Marque_Voiture(DesignationMarq) VALUES(?)');

                    $variables = array($designation);
    
                    $req->execute($variables);

                    if($req)
                        {
                            echo 'Enregistrement éffectué avec succes';
                        }
                    else
                        {
                            echo "Echec d'enregistrement";
                        }
                }
            else
                {
                    echo '<p class= "spacer">S.V.P veuillez renseigner tous les champs</p>';
                }
        }



    