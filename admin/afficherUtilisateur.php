<?php
//connexion à la base de données
    require_once("database.php");
	
//Affichages de toutes les informations

		$reponse = $bdd->query('SELECT * FROM utilisateurs');
	?>
<!DOCTYPE html>
<html>
	<body>
		<table border="1" width="60%">
			<thead>
				<tr>
					<th><strong>ID</strong></th>

					<th><strong>Login</strong></th>
							
					<th><strong>Password</strong></th>
							
					<th><strong>Photo</strong></th>

					<th><strong>Niveau</strong></th>
				</tr>
			</thead>
						
			<tbody>
				<?php while($donnees = $reponse->fetch()) { ?>
				<tr>
					<td><?php echo($donnees['ID']) ?></td>

					<td><?php echo htmlspecialchars($donnees['Login']) ?></td>
						
					<td><?php echo htmlspecialchars($donnees['Password']) ?></td>
						
					<td><img src="images/<?php echo ($donnees['Photo']) ?> "/></td>

					<td><?php echo htmlspecialchars($donnees['Niveau']) ?></td>

					<?php if($_SESSION['NIV']==0){?>

					<td><a href="SuprimerUtilisateur.php?ID=<?php echo htmlspecialchars($donnees['ID']) ?>"><strong>Suprimer</strong></a></td>

					<td><a href="EditerModifier.php?ID=<?php echo htmlspecialchars($donnees['ID']) ?>"><strong>Editer</strong></a></td> 
								<?php } ?>	
				</tr>
				<?php
					}
					$reponse->closeCursor();
				?>
			</tbody>			
		</table>
	</body>
</html>
					