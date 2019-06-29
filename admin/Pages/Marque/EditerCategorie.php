<?php
	require_once('../database.php');
	require_once('../entete.php');
	
    $code = $_GET['id'];

    $req = $bdd->prepare('SELECT * FROM Categorie WHERE CODE_CAT=?');
    $variable = array($code);
	$req->execute($variable);
	$donnees = $req->fetch();

?>
	<body>
		<div class="col-md-6 col-xs_12 spacer col-md-offest">
			<div class="panel-info spacer ">
				<div class="panel-heading">La catégorie à modifier</div>
				<div class="panel-body">
					<form method="post" action="ModifierCategorie.php">

						<div class="form-group">
							<label class="control-label">Code:</label>
							<input type="text" name="id" value="<?php echo $donnees['CODE_CAT']; ?>" readonly class="form-control">
						</div>

						<div class="form-group">
							<label class="control-label">Designation:</label>
							<input type="text" name="design" value="<?php echo $donnees['NOM_CAT']; ?>" class="form-control">
						</div>

						<div class="form-group">
							<label class="control-label">Description:</label>
							<input type="text" name="descrip" value="<?php echo $donnees['DESCRIPTION_CAT']; ?>" class="form-control">
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