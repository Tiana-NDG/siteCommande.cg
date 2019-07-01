<?php
    if(isset($_POST['submit']))
        {
            require_once("../database.php");

            $code = $_POST['id'];
            $matricule = $_POST['matricule'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $genre = $_POST['genre'];
            $tel = $_POST['tel'];
            $pays = $_POST['pays'];
            $ville = $_POST['ville'];
            $adresse = $_POST['adresse'];

            if(!empty($matricule) && !empty($nom) && !empty($prenom) && !empty($genre) && !empty($tel) && !empty($pays) && !empty($ville) && !empty($adresse))
                {
                    //Modification des données dans la base de donnée
        
                    $req = $bdd->prepare('UPDATE Agent SET CodeAg =?, NomAg =?, PrenomAg =?, GenreAg =?, TelAg =?, PaysAg =?, VilleAg =?, AdresseAg =?  WHERE CodeAg=?');

                    $variables = array($matricule, $nom, $prenom, $genre, $tel, $pays, $ville, $adresse, $code);
    
                    $req->execute($variables);

                   if($req)
                        {
                            //header("location:AfficherAgent.php");
                        }
                    else
                        {
                            echo "Echec; une erreur c'est produite d'une lors de l'enregistrement";
                        } 
                }
            else
                {
                    echo '<p class= "spacer">S.V.P veuillez renseigner tous les champs</p>';
                }
        }    