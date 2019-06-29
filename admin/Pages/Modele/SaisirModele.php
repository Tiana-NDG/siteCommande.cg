<?php require_once('../entete.php');?>
<?php   //require_once('AjouterCategorie.php'); ?>

       
       <div class="container col-md-6 spacer center">
       
        <form method="post" action="AjouterModele.php">
           
                <div class="form-group">
                    <label class="control-label">Designation:</label>
                    <input type="text" name="designation" class="form-control">
                </div>

                <div class="form-group">
					<label class="control-label">Marque:</label>
					<select name="marque" class="custom-select mb-6">

						<?php
							require_once('../database.php');

							$req = $bdd->prepare('SELECT * FROM Marque_Voiture');
				
							$req->execute();
				
							while($marque = $req->fetch())
									{
						?>
							<option value="<?= $marque['CodeMarq']; ?>"><?php echo $marque['DesignationMarq']; ?></option>

							<?php } ?>
					</select>
				</div>

                <div>
                    <input type="submit" value="Ajouter" name="submit"/>
                </div>
            </div>
        </form>
    </body>
</html>



