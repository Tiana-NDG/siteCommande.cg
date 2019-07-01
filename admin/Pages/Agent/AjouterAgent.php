<?php
    require_once("../database.php");
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

            if(empty($matricule) || empty($nom) || empty($prenom) || empty($genre) || empty($tel) || empty($pays) || empty($ville) || empty($adresse) || !preg_match('/^[A-Z0-9_]+$/',$matricule)){
                echo 'Les champs sont vides ou le format du matricule est incorrecte <a href="javascript:history.back()">Ajouter un nouveau agent</a>';
            }else {
                //On verifie si le matricule existe deja dans la base de données

                $req = $bdd->prepare('SELECT CodeAg FROM Agent WHERE CodeAg = ?');
                $variable = array($matricule);
                $req->execute($variable);
                $agent = $req->fetch();

                //si c'est le cas on affiche un message d'erreur

                if($agent){ 
                    echo 'Le matricule de l\'agent existe déjà dans la base de donnée <a href="javascript:history.back()">Ajouter un nouveau agent</a>';
                }else{
                    //Enregistrement des données dans la base de donnée

                    $req = $bdd->prepare('INSERT INTO Agent(CodeAg, NomAg, PrenomAg, GenreAg, TelAg, PaysAg, VilleAg, AdresseAg) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
                    $variables = array($matricule, $nom, $prenom, $genre, $tel, $pays, $ville, $adresse);
                    $req->execute($variables);

                    if($req){
                            echo 'Enregistrement éffectué avec succes, <a href="javascript:history.back()">Ajouter un nouveau agent</a>';
                        }
                    else{
                            echo 'Echec d\'enregistrement, <a href="javascript:history.back()">Ajouter un nouveau agent</a>';
                        }
                }
            }

        }
