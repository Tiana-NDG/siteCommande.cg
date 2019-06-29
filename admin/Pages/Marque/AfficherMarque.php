<?php
	require_once("../entete.php");
	require_once("../database.php");
		
		//Affichages de toutes les marques

			$reponse = $bdd->prepare('SELECT * FROM Marque_Voiture');

			$reponse->execute();
?>
	<body>
		<?php require_once("entete.php")?>
		<div class="col-md-6 col-xs_12 spacer col-md-offest">
			<div class="panel-info spacer ">
				<div class="panel-heading">Liste des marques</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Désignation</th>
							</tr>
						</thead>
						<tbody>
							<?php while($donnees = $reponse->fetch()) { ?>
							<tr>
								<td><?php echo htmlspecialchars($donnees['DesignationMarq']) ?></td>

								<td><a href="EditerMarque.php?id=<?php echo $donnees['CodeMarq']; ?>">Modifier</a></td>
								<td><a href="SupprimerMarque.php?id=<?php echo $donnees['CodeMarq']; ?>">Supprimer</a></td>
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