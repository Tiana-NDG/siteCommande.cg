<?php
    session_start();
    require_once('fonctions.php');
    $errors = array(); 
    require_once('../database.php');


    if (!empty($_POST['submit']) && !empty($_POST['nom']) && !empty($_POST['passe'])) {
    
        $req = $bdd->prepare('SELECT * FROM Client WHERE NomCli =:nom OR EmailCli =:nom');
        $req->execute(['nom' => $_POST['nom']]);
        $client = $req->fetch();

        // on vérifie si les deux mots de passes sont identiques

        if(password_verify($_POST['passe'], $client['MotdePasseCli'])){

            /*$_SESSION['auth'] = $client;
            $_SESSION['flash']['success'] = 'Vous ête maintenant connecté au site';
            header('location: ../Recherche/recherche.php');*/

            $_SESSION['code'] = $client['CodeCli'];
            $_SESSION['email'] = $client['EmailCli'];
            $_SESSION['MotdePasse'] = $client['MotdePasse'];
            $_SESSION['flash']['success'] = 'Vous ête maintenant connecté au site';
            header('location: Profil.php?id='.$_SESSION['code']);

            exit();
        }else {
            $_SESSION['flash']['danger'] = 'Indentifiant ou mot de passe incorrecte';
        }
        
    }
