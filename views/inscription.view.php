<?php $title="Inscription"; ?>
<?php include('portion/p_header.php'); ?>
<div class="main-content">

<div class="container">

      <div class="container">
    	<h1 class="text-center lead">Devenez dès à présent membre!</h1>
        <!-- affichage des message d'erreurs -->
        <?php include('portion/p_erreur.php')?>

    	<form data-parsley-validate method="POST" class="well col-md-6 col-md-offset-3" autocomplete="off">
    		<!-- Nom utilisateur -->
    		<div class="form-group">
    			<label class="control-label" for="nom" >Nom:</label>
    			<input type="text" value="<?= afficherdonne('nom')?>" class="form-control" name="nom" id="nom" required="required">
    		</div>

    		<!-- Pseudo utilisateur -->
    		<div class="form-group">
    			<label class="control-label" for="pseudo" >Pseudo</label>
    			<input type="text" data-parsley-minlength="3" value="<?= afficherdonne('pseudo')?>" class="form-control" name="pseudo" id="pseudo" required="required">
    		</div>

    		<!-- Email utilisateur -->
    		<div class="form-group">
    			<label class="control-label" for="email" >Email:</label>
    			<input type="email" data-parsley-trigger="keypress" value="<?= afficherdonne('email')?>" class="form-control" name="email" id="email" required="required">
    		</div>

    		<!-- Password utilisateur -->
    		<div class="form-group">
    			<label class="control-label" for="password" >Mot de passe:</label>
    			<input type="password" class="form-control" name="password" id="password" required="required">
    		</div>

    		<!-- Password utilisateur -->
    		<div class="form-group">
    			<label class="control-label" for="pass_c" >Confirmer votre mot de passe:</label>
    			<input type="password" class="form-control" name="pass_c" id="pass_c" required="required"  data-parsley-equalto="#password">
    		</div>

    		<input type="submit" class="btn btn-primary" value="Inscription" name="enregistrer">
    	</form>

      </div><!-- /.container -->


</div>

<?php include('portion/p_footer.php'); ?>