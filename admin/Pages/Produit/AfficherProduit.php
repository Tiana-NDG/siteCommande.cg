<?php
	require_once("../entete.php");
//connexion à la base de données
	require_once("../database.php");
	
//Affichages de toutes les pièces détachées

	$reponse = $bdd->prepare('SELECT * FROM Pieces INNER JOIN Modele_Voiture ON Pieces.CodeMod = Modele_Voiture.CodeMod');
	$reponse->execute();
?>
<!DOCTYPE html>
<html>
	<body>
		<table border="1" width="60%">
			<thead>
				<tr>
					<th><strong>Code du produit</strong></th>

					<th><strong>Images</strong></th>

					<th><strong>Designation</strong></th>
							
					<th><strong>Prix</strong></th>
							
                    <th><strong>Quantité</strong></th>
                    
                    <th><strong>Modele</strong></th>
				</tr>
			</thead>
				
			<tbody>
				<?php while($donnees = $reponse->fetch()) { ?>
				<tr>
					<td><?php echo htmlspecialchars($donnees['CodePro']); ?></td>

					<td><img src="../../../styles/images/<?php echo ($donnees['PhotoPro']);?>" width="100" heigth="100"/></td>

					<td><?php echo htmlspecialchars($donnees['DesignationPro']); ?></td>
						
                    <td><?php echo htmlspecialchars($donnees['PUPro']); ?></td>
                    
                    <td><?php echo htmlspecialchars($donnees['QtePro']); ?></td>

                    <td><?php echo htmlspecialchars($donnees['DesignationMod']); ?></td>

					<td><a href="EditerProduit.php?Code=<?php echo htmlspecialchars($donnees['CodePro']) ?>"><strong>Editer</strong></a></td>
					<td><a href="SupprimerProduit.php?Code=<?php echo htmlspecialchars($donnees['CodePro']) ?>"><strong>Suprimer</strong></a></td> 
				</tr>
				<?php
					}
					$reponse->closeCursor();
				?>
			</tbody>			
		</table>
	</body>
</html>