<?php
	require_once('../database.php');
	require_once('../entete.php');
	
    $code = $_GET['id'];

    $req = $bdd->prepare('SELECT * FROM Agent WHERE CodeAg=?');
    $variable = array($code);
	$req->execute($variable);
	$donnees = $req->fetch();
?>
<body>
	<div class="container spacer col-md-6 col-sx-12 col-md-offest-6">

		<div class="panel panel-info">

			<div class="panel-heading">Les informations à modifier</div>

			<div class="panel_body">

				<form method="POST" action="ModifierAgent.php">

					<div class="form-group">
						<label for="qt" class="control-label">Matricule agent:</label>
						<input type="text" name="matricule" value="<?php echo ($donnees['CodeAg']) ?>" id="qt" class="form-control">
					</div>	


					<div class="form-group" >
						<label for="nom" class="control-label">Nom agent:</label>
						<input type="text" name="nom" value="<?php echo ($donnees['NomAg']) ?>" id="nom" class="form-control">
					</div>

					<div class="form-group">
						<label for="qt" class="control-label">Prenom agent</label>
						<input type="text" name="prenom" value="<?php echo ($donnees['PrenomAg']) ?>" id="qt" class="form-control">
                    </div>
                    
                    <div class="form-group">
						<label for="cat" class="control-label">Genre:</label>
						<select name="genre" class="custom-select mb-6">
                                <option value="Masculin">Masculin</option>
                                <option value="Feminin">Feminin</option>
						</select>
					</div> 

					<div  class="form-group">
						<label for="pri" class="control-label">Téléphone:</label>
						<input type="text" name="tel" value="<?php echo ($donnees['TelAg']) ?>" id="pri" class="form-control">
					</div>
						
					<div class="form-group">
						<label for="cat" class="control-label">Pays:</label>
						<select name="pays" class="custom-select mb-6">
                                <option value="Congo">Congo</option>
						</select>
                    </div>
                    
                    <div class="form-group">
						<label for="cat" class="control-label">Ville:</label>
						<select name="ville" class="custom-select mb-6">
                                <option value="Brazza">Brazza</option>
                                <option value="Brazza">P/N</option>
						</select>
                    </div>
                    
                    <div  class="form-group">
						<label for="pri" class="control-label">Adresse:</label>
						<input type="text" name="adresse" value="<?php echo ($donnees['AdresseAg']) ?>" id="pri" class="form-control">
					</div>
						
					<div>
						<input type="submit" name="submit" class="btn btn-primary" value="Enregistrer">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>