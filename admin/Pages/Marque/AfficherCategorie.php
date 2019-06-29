<?php
	require_once("../entete.php");
	require_once("../database.php");
		
		//Affichages de toutes les lignes de la table étudiants

			$reponse = $bdd->prepare('SELECT * FROM Categorie');

			$reponse->execute();
?>
	<body>
		<?php require_once("entete.php")?>
		<div class="col-md-6 col-xs_12 spacer col-md-offest">
			<div class="panel-info spacer ">
				<div class="panel-heading">Liste des catégories</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Désignation</th>
								<th>Déscription</th>
							</tr>
						</thead>
						<tbody>
							<?php while($donnees = $reponse->fetch()) { ?>
							<tr>
								<td><?php echo htmlspecialchars($donnees['NOM_CAT']) ?></td>		
								<td><?php echo htmlspecialchars($donnees['DESCRIPTION_CAT']) ?></td>
								<td><a href="EditerCategorie.php?id=<?php echo $donnees['CODE_CAT']; ?>">Modifier</a></td>
								<td><a href="SupprimerCategorie.php?id=<?php echo $donnees['CODE_CAT']; ?>">Supprimer</a></td>
							</tr>
							<?php }
								$reponse->closeCursor();
							 ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>