<?php
    if (isset($_POST['submit'])){
        
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mdp1 = $_POST['mdp1'];
        $mdp2 = $_POST['mdp2'];

        if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($mdp1) && !empty($mdp2)) {
            
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                $req = $bdd->prepare('SELECT CodeCli FROM Client WHERE EmailCli = ?');
                $variable = array($email);
                $req->execute($variable);
                $client = $req->fetch();

                if($client){ 
                    echo ("Cette adresse mail est déjà utilisé pour un autre compte");
                }else {

                    if ($mdp1 == $mdp2) {

                        $password_crypt = password_hash($mdp1, PASSWORD_BCRYPT);

                        $req = $bdd->prepare("UPDATE Client SET NomCli = ?, PrenomCli= ?, EmailCli= ?, MotdePasseCli= ? WHERE CodeCli=?");
                        $variables = array($nom, $prenom, $email, $password_crypt, $code);
                        $req->execute($variables);

                            if($req){
                                header("location:Profil.php?id=".$code);
                            }else {
                                echo ("Desolé! les informations n'ont pas été modifiées");
                            }
                    }else {
                        echo ('Les deux mots de passes doivent être identiques');
                    }
                }

            }else {
                echo ("Le format de votre adresse mail n'est pas correcte");
            }

        }else {
            echo ('Veuillez remplir tous les champs s.v.p');
        }
    }
    