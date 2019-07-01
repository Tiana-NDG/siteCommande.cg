<?php
	require_once("../entete.php");
	require_once("../database.php");
		
		//Affichages de tous les agents

			$reponse = $bdd->prepare('SELECT * FROM Agent');
			$reponse->execute();
?>
	<body>
		<div class="col-md-6 col-xs_12 spacer col-md-offest">
			<div class="panel-info spacer ">
				<div class="panel-heading">Liste des agents</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
                            <tr>
								<th>Matricule agent</th>
								<th>Nom</th>
                                <th>Prenom</th>
                                <th>Genre</th>
                                <th>Téléphone</th>
                                <th>Pays</th>
                                <th>Ville</th>
                                <th>Adresse</th>
                            </tr>
						</thead>
						<tbody>
							<?php while($donnees = $reponse->fetch()) { ?>
							<tr>
                                <td><?php echo htmlspecialchars($donnees['CodeAg']) ?></td>
                                <td><?php echo htmlspecialchars($donnees['NomAg']) ?></td>
                                <td><?php echo htmlspecialchars($donnees['PrenomAg']) ?></td>
                                <td><?php echo htmlspecialchars($donnees['GenreAg']) ?></td>
                                <td><?php echo htmlspecialchars($donnees['TelAg']) ?></td>
                                <td><?php echo htmlspecialchars($donnees['PaysAg']) ?></td>
                                <td><?php echo htmlspecialchars($donnees['VilleAg']) ?></td>
                                <td><?php echo htmlspecialchars($donnees['AdresseAg']) ?></td>

								<td><a href="EditerAgent.php?id=<?php echo $donnees['CodeAg']; ?>">Modifier</a></td>
								<td><a onClick="return confirm('Etes-vous sûre de vouloir Supprimer ?')" href="SupprimerAgent.php?id=<?php echo $donnees['CodeAg']; ?>">Supprimer</a></td>
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