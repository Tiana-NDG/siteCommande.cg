<?php 
   require_once('../entete.php');
   require_once('ControleInscription.php');
?>
<body>
	<div class="container spacer col-md-6 col-sx-12 col-md-offest-6">
		<div class="panel panel-info">
			<div class="panel-heading">Les informations consernant le client</div>
			<div class="panel_body">

                <?php if(!empty($errors)):?>

                    <div class="alert alert-dander">
                        <p>Vous n'avez pas correctement rempli le formulaire</p>
                        <ul>
                            <?php foreach ($errors as $error):?>
                                <li><?= $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                <?php endif; ?>

				<form method="POST" action="#">
					<div class="form-group" >
						<label for="nom" class="control-label">Nom du client:</label>
						<input type="text" name="nom" id="nom" class="form-control">
					</div>
					<div class="form-group">
						<label for="qt" class="control-label">Prenom du client</label>
						<input type="text" name="prenom" id="qt" class="form-control">
               </div>
               <div class="form-group">
						<label for="qt" class="control-label">Votre mail</label>
						<input type="email" name="email" id="qt" class="form-control">
               </div>
					<div  class="form-group">
						<label for="pri" class="control-label">Téléphone:</label>
						<input type="text" name="tel" id="pri" class="form-control">
					</div>
					<div  class="form-group">
						<label for="pri" class="control-label">Mot de passe:</label>
						<input type="password" name="passe" id="pri" class="form-control">
					</div>
               <div  class="form-group">
						<label for="pri" class="control-label">Confirmer votre de passe:</label>
						<input type="password" name="passeConf" id="pri" class="form-control">
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
						<input type="text" name="adresse" id="pri" class="form-control">
					</div>	
					<div>
						<input type="submit" name="submit" class="btn btn-primary" value="S'inscrire">
					</div>
					<p>Vous avez déjà un compte?<a href="Connexion.php">Se connecter</a></p>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
