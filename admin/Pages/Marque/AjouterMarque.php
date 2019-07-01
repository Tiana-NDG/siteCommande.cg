<?php
    require_once("../database.php");

    if(isset($_POST['submit']))
        {
            $designation = $_POST['designation'];

            if(empty($designation) || !preg_match('/^[a-zA-Z0-9_]+$/',$designation)){
                    echo 'Le champ désignation est vide ou le format de la désignation est incorrecte <a href="javascript:history.back()">Ajouter une nouvelle marque</a>';
            }else{
                    //On verifie si ce surnom existe deja dans la base de données

                    $req = $bdd->prepare('SELECT CodeMarq FROM Marque_Voiture WHERE DesignationMarq = ?');
                    $variable = array($designation);
                    $req->execute($variable);
                    $marque = $req->fetch();

                    //si c'est le cas on affiche un message d'erreur

                    if($marque){ 
                        echo 'La désignation de la marque existe déjà dans la base de donnée <a href="javascript:history.back()">Ajouter une nouvelle marque</a>';
                    }else {
                        //Enregistrement des données dans la base de donnée
            
                        $req = $bdd->prepare('INSERT INTO Marque_Voiture(DesignationMarq) VALUES(?)');

                        $variables = array($designation);
        
                        $req->execute($variables);

                        if($req){
                            echo 'Enregistrement éffectué avec succes, <a href="javascript:history.back()">Ajouter une nouvelle marque</a>';
                        }
                        else{
                            echo 'Echec d\'enregistrement <a href="javascript:history.back()">Voulez-vous réessayer?</a>';
                        }
                }   
            }
        }



    