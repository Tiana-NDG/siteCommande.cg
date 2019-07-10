<?php
    require_once('fonctions.php');
    $errors = array(); 
    require_once('../database.php');

    if(isset($_POST['submit'])){

        //Recuperation des variables

        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $tel = htmlspecialchars($_POST['tel']);
        $passe = $_POST['passe'];
        $passeConf = $_POST['passeConf'];
        $type = htmlspecialchars($_POST['typecli']);
        $pays = htmlspecialchars($_POST['pays']);
        $ville = htmlspecialchars($_POST['ville']);
        $adresse = htmlspecialchars($_POST['adresse']);

        //On vérifie les differents champs

        if(empty($nom) || !preg_match('/^[a-zA-Z0-9_]+$/', $nom)){
            $errors[$nom] = "Le champ nom est vide ou le format de votre nom n'est pas valide";
        }

        if(empty($prenom) || !preg_match('/^[a-zA-Z0-9_]+$/', $prenom)){
            $errors[$prenom] = "Le champ prénom est vide ou le format de votre prénom n'est pas valide";
        }

        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[$email] = "Le champ email est vide ou le format de votre mail n'est pas valide";
        }else { //on verifie si l'adresse mail existe déja dans la base de données
            $req = $bdd->prepare('SELECT CodeCli FROM Client WHERE EmailCli = ?');
            $variable = array($email);
            $req->execute($variable);
            $user = $req->fetch();

            //si c'est le cas on affiche un message d'erreur
            if($user){ 
                $errors[$email] = "Votre adresse mail est déjà utilisé pour un autre compte";
            }
        }

        if(empty($tel) || !preg_match('/^[0-9-]+$/', $tel)){
            $errors[$tel] = "Le champ téléphone est vide ou le format de votre numéro n'est pas valide";
        }else { //on verifie si l'adresse mail existe déja dans la base de données
            $req = $bdd->prepare('SELECT CodeCli FROM Client WHERE TelCli = ?');
            $variable = array($tel);
            $req->execute($variable);
            $user = $req->fetch();

            //si c'est le cas on affiche un message d'erreur
            if($user){ 
                $errors[$tel] = "Ce numéro est déjà utilisé pour un autre compte";
            }
        }

        if(empty($passe) || ($passe != $passeConf)){
            $errors[$passe] = "Votre mot de passe est incorrecte";
        }

        if(empty($pays) || !preg_match('/^[a-zA-Z0-9_]+$/', $pays)){
            $errors[$pays] = "Le champ Pays est vide ou le format n'est pas valide";
        }

        if(empty($ville) || !preg_match('/^[a-zA-Z0-9_]+$/', $ville)){
            $errors[$ville] = "Le champ Ville est vide ou le format n'est pas valide";
        }

        if(empty($adresse)){
            $errors[$adresse] = "Le champ adresse est vide ou le format n'est pas valide";
        }

        //debug($errors);

        //Insertion des données dans la base de donnée si la variable errors est vide

        if(empty($errors)){

            //on crypte le mot de passe
            $password_crypt = password_hash($passe, PASSWORD_BCRYPT);

            $req = $bdd->prepare('INSERT INTO Client(NomCli, PrenomCli, EmailCli, TelCli, MotdePasseCli, TypeCli, PaysCli, VilleCli, AdresseCli) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $variables = array($nom, $prenom, $email, $tel, $password_crypt, $type, $pays, $ville, $adresse);
            $req->execute($variables);

            if ($req) {
                //die("Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>");
                header("location:Connexion.php");
            }
        }

    }