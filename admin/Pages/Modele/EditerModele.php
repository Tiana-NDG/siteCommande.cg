<?php
	require_once('../database.php');
	require_once('../entete.php');
	
    $code = $_GET['id'];

    $req = $bdd->prepare('SELECT * FROM Modele_Voiture WHERE CodeMod=?');
    $variable = array($code);
	$req->execute($variable);
	$donnees = $req->fetch();

?>
	<body>
		<div class="col-md-6 col-xs_12 spacer col-md-offest">
			<div class="panel-info spacer ">
				<div class="panel-heading">Le modele à modifier</div>
				<div class="panel-body">
					<form method="post" action="ModifierModele.php">

						<div class="form-group">
							<label class="control-label">Code:</label>
							<input type="hidden" name="id" value="<?php echo $donnees['CodeMod']; ?>" readonly class="form-control">
						</div>

						<div class="form-group">
							<label class="control-label">Designation:</label>
							<input type="text" name="designation" value="<?php echo $donnees['DesignationMod']; ?>" class="form-control">
						</div>

						<div class="form-group">
							<label class="control-label">Choisir la marque:</label>
							<select name="marque" class="custom-select mb-6">

								<?php
									require_once('../database.php');

									$req = $bdd->prepare('SELECT * FROM Marque_Voiture');
					
									$req->execute();
					
									while($marque = $req->fetch())
										{
								?>
									<option value="<?= $marque['CodeMarq']; ?>"><?php echo $marque['DesignationMarq']; ?></option>

										<?php } ?>
							</select>
						</div>
		
						<div>
							<input type="submit" class="btn btn-primary" name="submit"value="Modifier"/>
		   				</div>
   					</form>
				</div>
			</div>
		</div>
	</body>
</html>