<?php
   
    if(isset($_POST['submit']))
        {

            $designation = $_POST['designation'];
            $codemarque = $_POST['marque'];

            if(!empty($designation) && !empty($codemarque) )
                {
                    //Enregistrement des données dans la base de donnée

                    require_once("../database.php");
        
                    $req = $bdd->prepare('INSERT INTO Modele_Voiture(DesignationMod, CodeMarq) VALUES( ?, ?)');

                    $variables = array($designation, $codemarque);
    
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



    