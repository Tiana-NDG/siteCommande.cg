<?php
	require_once('../database.php');
	require_once('../entete.php');
	
    $code = $_GET['id'];

    $req = $bdd->prepare('SELECT * FROM Marque_Voiture WHERE CodeMarq=?');
    $variable = array($code);
	$req->execute($variable);
	$donnees = $req->fetch();
?>
	<body>
		<div class="col-md-6 col-xs_12 spacer col-md-offest">
			<div class="panel-info spacer ">
				<div class="panel-heading">La marque à modifier</div>
				<div class="panel-body">
					<form method="post" action="ModifierMarque.php">

						<div class="form-group">
							<label class="control-label">Code:</label>
							<input type="text" name="id" value="<?php echo $donnees['CodeMarq']; ?>" readonly class="form-control">
						</div>

						<div class="form-group">
							<label class="control-label">Designation:</label>
							<input type="text" name="designation" value="<?php echo $donnees['DesignationMarq']; ?>" class="form-control">
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