<?php $title="Connexion"; ?>
<?php include('portion/p_header.php'); ?>
<div class="main-content">

<div class="container">

      <div class="container">
    	<h1 class="text-center">Connexion</h1>
        <!-- affichage des message d'erreurs -->
        <?php include('portion/p_erreur.php')?>

    	<form data-parsley-validate method="POST" class="well col-md-6 col-md-offset-3" autocomplete="off">
    		<!-- Identifiant de l'utilisateur -->
    		<div class="form-group">
    			<label class="control-label" for="identifiant" >Pseudo ou Adresse mail</label>
    			<input type="text" value="<?= afficherdonne('identifiant')?>" class="form-control" name="identifiant" id="identifiant" required="required">
    		</div>

    		

    		<!-- Password utilisateur -->
    		<div class="form-group">
    			<label class="control-label" for="password" >Mot de passe:</label>
    			<input type="password" class="form-control" name="password" id="password" required="required">
    		</div>

    		

    		<input type="submit" class="btn btn-primary" value="Connexion" name="login">
    	</form>

      </div><!-- /.container -->


</div>

<?php include('portion/p_footer.php'); ?>