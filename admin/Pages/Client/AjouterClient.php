<?php
    require_once("../database.php");
    if(isset($_POST['submit'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $passe = $_POST['passe'];
        $type = $_POST['typecli'];
        $pays = $_POST['pays'];
        $ville = $_POST['ville'];
        $adresse = $_POST['adresse'];

        if(empty($email) || empty($nom) || empty($prenom) || empty($passe) || empty($type) || empty($tel) || empty($pays) || empty($ville) || empty($adresse) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Vous n'avez pas correctementn remplis les champs"; 
        }else{
            $req = $bdd->prepare('SELECT CodeCli FROM Client WHERE EmailCli = ?');
            $variable = array($email);
            $req->execute($variable);
            $client = $req->fetch();

            //si c'est le cas on affiche un message d'erreur
            if($client){ 
                echo 'Cette adresse existe déjà dans la base de donnée, <br> 
                        Pour des raisons de sécurité, veuillez changer l\'adresse mail 
                        <a href="javascript:history.back()">Réessaye</a>';
            }else{
                //Enregistrement des données dans la base de donnée  
                $req = $bdd->prepare('INSERT INTO Client(NomCli, PrenomCli, EmailCli, TelCli, MotdePasseCli, TypeCli, PaysCli, VilleCli, AdresseCli) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
                //on crypte le mot de passe
                $passe_crypt = password_hash($passe, PASSWORD_BCRYPT);
                $variables = array($nom, $prenom, $email, $tel, $passe_crypt, $type, $pays, $ville, $adresse);
                $req->execute($variables);

                if($req){
                    echo 'Enregistrement éffectué avec succes, <a href="javascript:history.back()">Ajouter un nouveau client</a>';
                }
                else{
                    echo 'Echec d\'enregistrement, <a href="javascript:history.back()">Ajouter un nouveau client</a>';
                }
            }
        }           
    }



    