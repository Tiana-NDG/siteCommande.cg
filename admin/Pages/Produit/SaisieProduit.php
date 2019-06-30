<?php 
	require_once('../entete.php');
?>
<body>
	<div class="container spacer col-md-6 col-sx-12 col-md-offest-6">

		<div class="panel panel-info">

			<div class="panel-heading">Pieces détachées</div>

			<div class="panel_body">

				<form method="POST" action="AjouterProduit" enctype="multipart/form-data">

					<div class="form-group">
						<label for="qt" class="control-label">Code du produit:</label>
						<input type="text" name="code" id="qt" class="form-control">
					</div>	


					<div class="form-group" >
						<label for="nom" class="control-label">Designation:</label>
						<input type="text" name="designation" id="nom" class="form-control">
					</div>

					<div class="form-group">
						<label for="qt" class="control-label">Quantité de stock:</label>
						<input type="number" name="quantite" id="qt" class="form-control">
					</div>

					<div  class="form-group">
						<label for="pri" class="control-label">Prix unitaire:</label>
						<input type="number" name="prix" id="pri" class="form-control">
					</div>
						
					<div class="form-group">
						<label for="photo" class="control-label">Image:</label>
						<input type="file" name="image" id="photo" class="form-control">
					</div>

					<div class="form-group">
						<label for="cat" class="control-label">Modele:</label>
						<select name="modele" class="custom-select mb-6">

							<?php
								require_once('../database.php');

								$req = $bdd->prepare('SELECT * FROM Modele_Voiture');
				
								$req->execute();
				
								while($cat = $req->fetch())
									{
							?>
								<option value="<?= $cat['CodeMod']; ?>"><?php echo $cat['DesignationMod']; ?></option>

									<?php } ?>
						</select>
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