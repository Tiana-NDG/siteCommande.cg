<?php
	require_once("../entete.php");
	require_once("../database.php");
		
		//Affichages de toutes les lignes de la table étudiants

			$reponse = $bdd->prepare('SELECT * FROM Modele_Voiture INNER JOIN Marque_Voiture ON Modele_Voiture.CodeMarq = Marque_Voiture.CodeMarq');

			$reponse->execute();
?>
	<body>
		<div class="col-md-6 col-xs_12 spacer col-md-offest">
			<div class="panel-info spacer ">
				<div class="panel-heading">Liste des modeles</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Désignation</th>
								<th>Marque</th>
							</tr>
						</thead>
						<tbody>
							<?php while($donnees = $reponse->fetch()) { ?>
							<tr>
								<td><?php echo htmlspecialchars($donnees['DesignationMod']) ?></td>		
								<td><?php echo htmlspecialchars($donnees['CodeMarq']) ?></td>
								<td><a href="EditerModele.php?id=<?php echo $donnees['CodeMod']; ?>">Modifier</a></td>
								<td><a href="SupprimerModele.php?id=<?php echo $donnees['CodeMod']; ?>">Supprimer</a></td>
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