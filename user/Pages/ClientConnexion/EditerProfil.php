<?php
    session_start();
    require_once('../entete.php');
    

    if (isset($_SESSION['code'])) {

        $code = $_SESSION['code'];

        $req = $bdd->prepare('SELECT * FROM Client WHERE CodeCli = ?');
        $variable = array($code);
        $req->execute($variable);
        $client = $req->fetch();

        require_once('ModifierProfil.php');

?>
<body>
	<div class="container spacer col-md-6 col-sx-12 col-md-offest-6">
		<div class="panel panel-info">
			<div class="panel-heading">Edition de votre profil</div>
			<div class="panel_body">
            
				<form method="POST" action="#">
                    <div class="form-group">
						<label for="qt" class="control-label"> Nouveau nom</label>
						<input type="text" name="nom" id="qt" class="form-control" value="<?= $client['NomCli']; ?>">
                    </div>
					<div  class="form-group">
						<label for="pri" class="control-label">Nouveau prénom:</label>
						<input type="text" name="prenom" id="pri" class="form-control" value="<?= $client['PrenomCli']; ?>">
					</div>
        	        <div class="form-group">
						<label for="qt" class="control-label">Nouvelle adresse mail</label>
						<input type="text" name="email" id="qt" class="form-control" value="<?= $client['EmailCli']; ?>">
                    </div>
                    <div class="form-group">
						<label for="qt" class="control-label">Mot de passe</label>
						<input type="password" name="mdp1" id="qt" class="form-control">
                    </div>
                    <div class="form-group">
						<label for="qt" class="control-label">Confirmation du mot de passe</label>
						<input type="password" name="mdp2" id="qt" class="form-control">
                    </div>
        
                    <div>
						<input type="submit" name="submit" class="btn btn-success" value="Mettre à jour votre profil">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php
    }else {
        header('location: Connexion.php');
    }
?>