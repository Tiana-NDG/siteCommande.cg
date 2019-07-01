<?php
    require_once("../database.php");
    if(isset($_POST['submit']))
        {
            $designation = $_POST['designation'];
            $codemarque = $_POST['marque'];

            if(empty($designation) || empty($codemarque) || !preg_match('/^[a-zA-Z0-9_]+$/',$designation)){
                echo 'Le champ désignation est vide ou le format de la désignation est incorrecte <a href="javascript:history.back()">Ajouter une nouveau modele</a>';
            }else{
                //On verifie si ce surnom existe deja dans la base de données

                $req = $bdd->prepare('SELECT CodeMod FROM Modele_Voiture WHERE DesignationMod = ?');
                $variable = array($designation);
                $req->execute($variable);
                $marque = $req->fetch();

                //si c'est le cas on affiche un message d'erreur

                if($marque){ 
                    echo 'La désignation du modèle existe déjà dans la base de donnée <a href="javascript:history.back()">Ajouter une nouveau modele</a>';
                }else {
                    //Enregistrement des données dans la base de donnée

                    $req = $bdd->prepare('INSERT INTO Modele_Voiture(DesignationMod, CodeMarq) VALUES( ?, ?)');
                    $variables = array($designation, $codemarque);
                    $req->execute($variables);

                        if($req){
                            echo 'Enregistrement éffectué avec succes, <a href="javascript:history.back()">Ajouter une nouveau modele</a>';
                        }else{
                            echo 'Echec d\'enregistrement, <a href="javascript:history.back()">Ajouter une nouveau modele</a>';
                        }
                }
            }
        }