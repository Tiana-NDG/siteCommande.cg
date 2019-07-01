<?php
    if(isset($_POST['submit']))
        {
            require_once("../database.php");

            $code = $_POST['id'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $passe = $_POST['passe'];
            $type = $_POST['typecli'];
            $pays = $_POST['pays'];
            $ville = $_POST['ville'];
            $adresse = $_POST['adresse'];

            if(!empty($email) && !empty($nom) && !($prenom) && !empty($passe) && !empty($type) && !empty($tel) && !empty($pays) && !empty($ville) && !empty($adresse))
                {
                    //Modification des données dans la base de donnée
        
                    $req = $bdd->prepare('UPDATE Client SET NomCli =?, PrenomCli =?, EmailCli =?, TelCli =?, MotdePasseCli =?, TypeCli =?, PaysCli =?, VilleCli =?, AdresseCli =?  WHERE CodeCli=?');
                    $variables = array($nom, $prenom, $email, $tel, $passe, $type, $pays, $ville, $adresse);
                    $req->execute($variables);

                   if($req){
                        header("location:AfficherClient.php");
                    }else{
                        echo 'Echec; une erreur c\'est produite d\'une lors de l\'enregistrement <a href="javascript:history.back()">Modifier les informations du client</a>';
                    } 
                }else{
                    echo '<p class= "spacer">S.V.P veuillez renseigner tous les champs ,<br><a href="javascript:history.back()">Modifier les informations du client</a></p>';
                }
        }    