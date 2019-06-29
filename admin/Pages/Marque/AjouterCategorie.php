<?php
   
    if(isset($_POST['submit']))
        {

            $designa = $_POST['design'];
            $descrip = $_POST['descrip'];

            if(!empty($designa) && !empty($descrip) )
                {
                    //Enregistrement des données dans la base de donnée

                    require_once("../database.php");
        
                    $req = $bdd->prepare('INSERT INTO Categorie(NOM_CAT, DESCRIPTION_CAT) VALUES( ?, ?)');

                    $variables = array($designa, $descrip);
    
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



    