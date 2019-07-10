<?php
    require_once('../entete.php');
    require_once('VerifierConnexion.php');
?>
<body>
	<div class="container spacer col-md-6 col-sx-12 col-md-offest-6">
		<div class="panel panel-info">
			<div class="panel-heading">Se connecter</div>
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
                    <div class="form-group">
						<label for="qt" class="control-label"> Nom ou adresse mail</label>
						<input type="text" name="nom" id="qt" class="form-control">
                    </div>
					<div  class="form-group">
						<label for="pri" class="control-label">Mot de passe:</label>
						<input type="password" name="passe" id="pri" class="form-control">
					</div>
        	
					<div>
						<input type="submit" name="submit" class="btn btn-success" value="Connexion">
					</div>
                    <p>Vous n'avez pas encore de compte?<a href="Inscription.php">S'inscrire</a></p>
				</form>
			</div>
		</div>
	</div>
</body>
</html>