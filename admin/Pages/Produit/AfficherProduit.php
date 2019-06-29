<?php
	require_once("../entete.php");
//connexion à la base de données
    require_once("../database.php");
	
//Affichages de toutes les lignes de la table étudiants

		$reponse = $bdd->prepare('SELECT * FROM Produits INNER JOIN Categorie ON Produits.CODE_CAT = Categorie.CODE_CAT');
		$reponse->execute();
	?>
<!DOCTYPE html>
<html>
	<body>
		<table border="1" width="60%">
			<thead>
				<tr>
					<th><strong>Images</strong></th>

					<th><strong>Designation</strong></th>
							
					<th><strong>Prix</strong></th>
							
                    <th><strong>Quantité</strong></th>
                    
                    <th><strong>Disponobilité</strong></th>

                    <th><strong>Promotion</strong></th>
                    
                    <th><strong>Categorie</strong></th>
				</tr>
			</thead>
				
			<tbody>
				<?php while($donnees = $reponse->fetch()) { ?>
				<tr>
					<td><img src="../styles/images/<?php echo ($donnees['PHOTO_PRO']);?>" width="100" heigth="100"/></td>

					<td><?php echo htmlspecialchars($donnees['DESIGNATION_PRO']); ?></td>
						
                    <td><?php echo htmlspecialchars($donnees['PRIX_PRO']); ?></td>
                    
                    <td><?php echo htmlspecialchars($donnees['QUANTITE_PRO']); ?></td>

                    <td><?php echo htmlspecialchars($donnees['DISPONIBILITE_PRO']); ?></td>

					<td><?php echo htmlspecialchars($donnees['PROMOTION_PRO']); ?></td>
                    
                    <td><?php echo htmlspecialchars($donnees['NOM_CAT']); ?></td>

					<td><a href="EditerProduit.php?Code=<?php echo htmlspecialchars($donnees['CODE_PRO']) ?>"><strong>Editer</strong></a></td>
					<td><a href="SupprimerProduit.php?Code=<?php echo htmlspecialchars($donnees['CODE_PRO']) ?>"><strong>Suprimer</strong></a></td> 
				</tr>
				<?php
					}
					$reponse->closeCursor();
				?>
			</tbody>			
		</table>
	</body>
</html>