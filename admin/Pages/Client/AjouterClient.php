<?php
    if(isset($_POST['submit']))
        {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $passe = $_POST['password'];
            $pays = $_POST['pays'];
            $ville = $_POST['ville'];
            $adresse = $_POST['adresse'];

            if(!empty($email) && !empty($nom) && !empty($prenom) && !empty($passe) && !empty($tel) && !empty($pays) && !empty($ville) && !empty($adresse))
                {
                    //Enregistrement des données dans la base de donnée

                    require_once("../database.php");
        
                    $req = $bdd->prepare('INSERT INTO Client(CodeCli, NomCli, PrenomCli, GenreAg, TelAg, PaysAg, VilleAg, AdresseAg) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');

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



    