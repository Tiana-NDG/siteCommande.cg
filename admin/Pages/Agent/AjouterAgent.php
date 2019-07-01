<?php
    if(isset($_POST['submit']))
        {
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
                    //Enregistrement des données dans la base de donnée

                    require_once("../database.php");
        
                    $req = $bdd->prepare('INSERT INTO Agent(CodeAg, NomAg, PrenomAg, GenreAg, TelAg, PaysAg, VilleAg, AdresseAg) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');

                    $variables = array($matricule, $nom, $prenom, $genre, $tel, $pays, $ville, $adresse);
    
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



    