<?php
	require_once('../database.php');
	require_once('../entete.php');
	
    $code = $_GET['id'];

    $req = $bdd->prepare('SELECT * FROM Client WHERE CodeCl=?');
    $variable = array($code);
	$req->execute($variable);
	$donnees = $req->fetch();
?>
<body>
<div class="container spacer col-md-6 col-sx-12 col-md-offest-6">
		<div class="panel panel-info">
			<div class="panel-heading">Les informations consernant le client</div>
			<div class="panel_body">

				<form method="POST" action="ModifierClient.php.php">
					<div class="form-group" >
						<label for="nom" class="control-label">Nom du client:</label>
						<input type="text" name="nom" value="<?php echo $donnees['NomCli'] ?>" id="nom" class="form-control">
					</div>
					<div class="form-group">
						<label for="qt" class="control-label">Prenom du client</label>
						<input type="text" name="prenom" value="<?php echo $donnees['PrenomCli'] ?>" id="qt" class="form-control">
                    </div>
                    <div class="form-group">
						<label for="qt" class="control-label">Email du client</label>
						<input type="email" name="email" value="<?php echo $donnees['EmailCli'] ?>" id="qt" class="form-control">
                    </div>
					<div  class="form-group">
						<label for="pri" class="control-label">Téléphone:</label>
						<input type="text" name="tel" value="<?php echo $donnees['TelCli'] ?>" id="pri" class="form-control">
					</div>
					<div  class="form-group">
						<label for="pri" class="control-label">Mot de passe:</label>
						<input type="password" name="passe" value="<?php echo $donnees['MotdePasseCli'] ?>" id="pri" class="form-control">
					</div>
					<div class="form-group">
						<label for="cat" class="control-label">Type de client:</label>
						<select name="typecli" class="custom-select mb-6">
								<option value="Particulier">Particulier</option>
								<option value="Entreprise">Entreprise</option>
						</select>
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
						<input type="text" name="adresse" value="<?php echo $donnees['AdresseAg'] ?>" id="pri" class="form-control">
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