<?php
			//Connexion à la base de données
			require_once('../database.php');

			//Déclaration des variables
		if(isset($_POST['submit']))
			{
				$code = $_POST['code'];

				$designation = $_POST['designation'];
			
				$prix = $_POST['prix'];
				
				$quantite = $_POST['quantite'];

				$modele = $_POST['modele'];
				
				$Photo = $_FILES['image']['name'];

			//Création du nom temporaire de la photo

			$file_tmp_name = $_FILES['image']['tmp_name'];

			//Emplacement du fichier

			move_uploaded_file($file_tmp_name, "./../../styles/images/$Photo");

			if( (!empty($code)) && (!empty($designation)) && (!empty( $prix)) && (!empty( $quantite)) && (!empty($Photo)) && (!empty($dispo)) )
				{
					//Enregistrement des données dans la base de donnée

					$req = $bdd->prepare('INSERT INTO Pieces (CodePro, DesignationPro, QtePro, PUPro, PhotoPro, CodeMod) VALUES( ?, ?, ?, ?, ?, ?, ?)');

					$variables = array($code, $designation, $quantite, $prix, $Photo, $modele);

					$req->execute($variables);

					if ($req) 
						{
							echo 'Enregistrement éffectué avec succes';
						}
					else
						{
							echo "Echec de l'enregistrement";
						}
				}
			else 
				{
					echo 'S.V.P veuillez renseignez tous les champs';
				}

	
			}
?>

		