<?php require_once('../entete.php');?>
<?php   //require_once('AjouterCategorie.php'); ?>

       
       <div class="container col-md-6 spacer center">
       
        <form method="post" action="AjouterCategorie.php">
           
                <div class="form-group">
                    <label class="control-label">Designation:</label>
                    <input type="text" name="design" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label">Description:</label>
                    <input type="text" name="descrip" class="form-control">
                </div>

                <div>
                    <input type="submit" value="Ajouter" name="submit"/>
                </div>
            </div>
        </form>
    </body>
</html>



