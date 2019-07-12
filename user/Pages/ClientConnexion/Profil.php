<?php
    session_start();
    require_once('../entete.php');

    if (isset($_GET['id']) AND $_GET['id'] > 0) {

        //On sécurise la variable id passée en parametre, on le convertit en nombre
        $getid = intval($_GET['id']);

        $req = $bdd->prepare('SELECT * FROM Client WHERE CodeCli = ?');
        $variable = array($getid);
        $req->execute($variable);
        $client = $req->fetch();
?>
<body>
	<div class="container spacer col-md-6 col-sx-12 col-md-offest-6">
		<div class="panel panel-info">
			<div class="panel-heading">Profil de <?=  $client['NomCli'] .' - '. $client['PrenomCli']; ?> </div>
			<div class="panel_body">

				<form method="POST" action="#">
                    <div class="form-group">
						<label for="qt" class="control-label"> Votre nom et prénom</label>
						<input type="text" name="nom" id="qt" class="form-control" value="<?= htmlspecialchars($client['NomCli'] .'    '. $client['PrenomCli']); ?>">
                    </div>
        	        <div class="form-group">
						<label for="qt" class="control-label">Votre adresse mail</label>
						<input type="text" name="email" id="qt" class="form-control" value="<?= htmlspecialchars($client['EmailCli']); ?>">
                    </div>
        <!-- Pour avoir la possibilité d'éditer il faut que le code du client soit le meme que celui passé dans la session -->
                    <?php
                        if (isset($_SESSION['code']) && $client['CodeCli'] == $_SESSION['code']) { ?>
                            <a href="EditerProfil.php">Editer mon profil</a><br>
                            <a href="Deconnecter.php">Se deconnecter</a>
                    <?php 
                        }
                    ?>
                    <!-- <p>Vous n'avez pas encore de compte?<a href="Inscription.php">S'inscrire</a></p> -->
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php
    }
?>