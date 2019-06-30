<?php

    $code = $_GET['id'];

    require_once('../entete.php');
    require_once('../database.php');
    
    $editer = $bdd->prepare("SELECT * FROM Pieces WHERE CodePro = ?"); 
    
    $varible = array($code);

    $editer->execute($varible);

    $answer = $editer->fetch();

    $editer->closeCursor();
?>
<body>
   <div class="col-md-12 col-xs-12 spacer">
        <div class="panel panel-info spacer">
            <div class="panel-heading">Editer la piece détachée</div>
            <div class="panel-body">

                <form action="ModifierProduit.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label">Code: <?= $answer['CodePro']?></label>
                        <input type="hidden" name="code" value="<?= $answer['CodePro']?>" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Image:</label>
                        <input type="file" name="photo" id="" class="form-control">
                        <img src="../../images/<?php echo $answer['PhotoPro']; ?>" alt="" width="100" heigth="100">
                    </div>
                    <div class="form-group" >
						<label for="nom" class="control-label">Designation:</label>
						<input type="text" name="designation" id="nom" value="<?= $answer['DesignationPro']?>" class="form-control">
					</div>
					<div  class="form-group">
						<label for="pri" class="control-label">Prix:</label>
						<input type="number" name="prix" id="pri" value="<?= $answer['PUPro']?>" class="form-control">
					</div> 
					<div class="form-group">
						<label for="qt" class="control-label">Quantité de stock:</label>
						<input type="number" name="quantite" id="qt" value="<?= $answer['QtePro']?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="modele" class="control-label">Choix du modele:</label>
						<select name="modele" class="custom-select mb-6">

							<?php
								require_once('../database.php');

								$req = $bdd->prepare('SELECT * FROM Modele_Voiture');
								$req->execute();
				
								while($modele = $req->fetch())
									{
							?>
								<option value="<?= $modele['CodeMod']; ?>"><?php echo $modele['DesignationMod']; ?></option>

									<?php } ?>
						</select>
					</div> 	
                    <div>
                        <button type="submit" name="submit" class="btn btn-success">Modifier</button>
                    </div>
                    <div>
                        <a href="AfficherProduit.php">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>