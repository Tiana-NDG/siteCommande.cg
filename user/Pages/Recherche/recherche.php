<?php
	session_start();
    require_once('../database.php');
    require_once('../entete.php');

    $mc = "NULL";

    if (isset($_POST['motcle'])) {
        $mc = $_POST['motcle'];
    }

    $reponse = $bdd->prepare("SELECT * FROM Pieces INNER JOIN Modele_Voiture ON Pieces.CodeMod = Modele_Voiture.CodeMod WHERE DesignationPro like '%$mc%'");
    $reponse->execute();

?>
<form method="POST" action="recherche.php">
   <input type="search" name="motcle" placeholder="Recherche..." value="<?= $mc;?>"/>
   <input type="submit" value="Valider" />
</form>

<!DOCTYPE html>
<html>
	<body>
		<p>Bonjour et bienvenu sur notre site <?= $_SESSION['auth']->NomCli;?> </p>
		<table border="1" width="60%">
			<thead>
				<tr>
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
					<td><img src="../../../styles/images/<?php echo ($donnees['PhotoPro']);?>" width="100" heigth="100"/></td>

					<td><?php echo htmlspecialchars($donnees['DesignationPro']); ?></td>
						
                    <td><?php echo htmlspecialchars($donnees['PUPro']); ?></td>
                    
                    <td><?php echo htmlspecialchars($donnees['QtePro']); ?></td>

                    <td><?php echo htmlspecialchars($donnees['DesignationMod']); ?></td>
				</tr>
				<?php
					}
					$reponse->closeCursor();
				?>
			</tbody>			
		</table>
	</body>
</html>

