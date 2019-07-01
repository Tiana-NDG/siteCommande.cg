<?php
	require_once("../entete.php");
	require_once("../database.php");
		
		//Affichages de tous les agents

			$reponse = $bdd->prepare('SELECT * FROM Client');
			$reponse->execute();
?>
	<body>
		<div class="col-md-6 col-xs_12 spacer col-md-offest">
			<div class="panel-info spacer ">
				<div class="panel-heading">Liste des clients</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
                            <tr>
								<th>Nom</th>
                                <th>Prenom</th>
								<th>Email</th>
								<th>Téléphone</th>
								<th>Mot de passe</th>
								<th>Type de client</th>
                                <th>Pays</th>
                                <th>Ville</th>
                                <th>Adresse</th>
                            </tr>
						</thead>
						<tbody>
							<?php while($donnees = $reponse->fetch()) { ?>
							<tr>
                                <td><?php echo htmlspecialchars($donnees['NomCli']) ?></td>
                                <td><?php echo htmlspecialchars($donnees['PrenomCli']) ?></td>
                                <td><?php echo htmlspecialchars($donnees['EmailCli']) ?></td>
								<td><?php echo htmlspecialchars($donnees['TelCli']) ?></td>
								<td><?php echo htmlspecialchars($donnees['MotdePasseCli']) ?></td>
								<td><?php echo htmlspecialchars($donnees['TypeCli']) ?></td>
                                <td><?php echo htmlspecialchars($donnees['PaysCli']) ?></td>
                                <td><?php echo htmlspecialchars($donnees['VilleCli']) ?></td>
                                <td><?php echo htmlspecialchars($donnees['AdresseCli']) ?></td>

								<td><a href="EditerClient.php?id=<?php echo $donnees['CodeCli']; ?>">Modifier</a></td>
								<td><a onClick="return confirm('Etes-vous sûre de vouloir Supprimer ?')" href="SupprimerClient.php?id=<?php echo $donnees['CodeCli']; ?>">Supprimer</a></td>
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