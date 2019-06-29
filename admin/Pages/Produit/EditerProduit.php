<?php

    $code = $_GET['Code'];

    require_once('../entete.php');
    require_once('../database.php');
    
    $editer = $bdd->prepare("SELECT * FROM Produits WHERE CODE_PRO = ?"); 
    
    $varible = array($code);

    $editer->execute($varible);

    $answer = $editer->fetch();

    $editer->closeCursor();
?>
<body>
   <div class="col-md-12 col-xs-12 spacer">
        <div class="panel panel-info spacer">
            <div class="panel-heading">Editer le produit</div>
            <div class="panel-body">

                <form action="ModifierProduit.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="" class="control-label">Code: <?= $answer['CODE_PRO']?></label>
                        <input type="hidden" name="code" value="<?= $answer['CODE_PRO']?>" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label">Image:</label>
                        <input type="file" name="photo" id="" class="form-control">
                        <img src="../../images/<?php echo $answer['PHOTO_PRO']; ?>" alt="" width="100" heigth="100">
                    </div>

                    <div class="form-group" >
						<label for="nom" class="control-label">Designation:</label>
						<input type="text" name="design" id="nom" value="<?= $answer['DESIGNATION_PRO']?>" class="form-control">
					</div>

					<div class="form-group">
						<label for="qt" class="control-label">Quantité de stock:</label>
						<input type="number" name="quantite" id="qt" value="<?= $answer['QUANTITE_PRO']?>" class="form-control">
					</div>

					<div  class="form-group">
						<label for="pri" class="control-label">Prix:</label>
						<input type="number" name="prix" id="pri" value="<?= $answer['PRIX_PRO']?>" class="form-control">
					</div>

					<div class="form-group">
						<label for="qt" class="control-label">Disponiblite du produit:</label>
						<input type="number" name="dispo" id="qt" value="<?= $answer['DISPONIBILITE_PRO']?>" class="form-control">
					</div>	
					
					<div class="form-group">
						<label for="seuil" class="control-label">Promotion produit:</label>
						<input type="number" name="promo" id="seuil" class="form-control" value="<?= $answer['PROMOTION_PRO']?>">
					</div> 

					<!-- <div class="form-group"> -->
						<!-- <label for="seuil" class="control-label">Selectionné:</label> -->
						<!-- <input type="text" name="selection" id="seuil"  class="form-control"> -->
					<!-- </div>  -->

					<div class="form-group">
						<label for="cat" class="control-label">Choisir la catégorie:</label>
						<select name="cat" class="custom-select mb-6">

							<?php
								require_once('database.php');

								$req = $bdd->prepare('SELECT * FROM Categorie');
				
								$req->execute();
				
								while($cat = $req->fetch())
									{
							?>
								<option value="<?= $cat['CODE_CAT']; ?>"><?php echo $cat['NOM_CAT']; ?></option>

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