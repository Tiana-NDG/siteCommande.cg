<?php
	//Connexion à la base de données
	require_once('../database.php');

	if(isset($_POST['submit'])){

		//Déclaration des variables

		$code = $_POST['code'];
		$designation = $_POST['designation'];
		$prix = $_POST['prix'];
		$quantite = $_POST['quantite'];
		$modele = $_POST['modele'];
		$Photo = $_FILES['image']['name'];
		$file_tmp_name = $_FILES['image']['tmp_name']; //Création du nom temporaire de la photo
		move_uploaded_file($file_tmp_name, "./../../../styles/images/$Photo"); //Emplacement du fichier

		if (empty($code) || empty($designation) || empty($prix) || empty($quantite) || empty($Photo) || empty($modele) || !preg_match('/^[A-Z0-9_]+$/',$code)) {
			echo 'Les champs sont vides ou le format du matricule est incorrecte <a href="javascript:history.back()">Ajouter un nouveau produit</a>';
		}else {
			//On verifie si le code du produit existe deja dans la base de données

			$req = $bdd->prepare('SELECT CodePro FROM Pieces WHERE CodePro = ?');
			$variable = array($code);
			$req->execute($variable);
			$produit = $req->fetch();

			//si c'est le cas on affiche un message d'erreur

			if($produit){ 
				echo 'Le code du produit existe déjà dans la base de donnée <a href="javascript:history.back()">Ajouter un nouveau produit</a>';
			}else {
				//Enregistrement des données dans la base de donnée

				$req = $bdd->prepare('INSERT INTO Pieces (CodePro, DesignationPro, QtePro, PUPro, PhotoPro, CodeMod) VALUES( ?, ?, ?, ?, ?, ?)');
				$variables = array($code, $designation, $quantite, $prix, $Photo, $modele);
				$req->execute($variables);

				if($req){
					echo 'Enregistrement éffectué avec succes, <a href="javascript:history.back()">Ajouter un nouveau produit</a>';
				}else{
					echo 'Echec de l\'enregistrement, <a href="javascript:history.back()">Ajouter un nouveau produit</a>';
				}
			}
		
		}
	
	}
?>