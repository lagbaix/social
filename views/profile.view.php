<?php $title="Page de Profil"; ?>
<?php include('portion/p_header.php'); ?>
<div class="main-content">

<div class="container">

      <div class="container">
      	<div class="row">
      		<div class="col-md-6">
      			<div class="panel panel-default">
    		<div class="panel-heading">
    			<h3 class="panel-title">Profil de <?= e($user->pseudo) ?> </h3>
    		</div>
    		<div class="panel-body">
    			
    			 <div class="row">
    			 	<div class="col-md-5">
    			 		<img src="<?= get_avatar($user->email) ?>" alt="Image de profil de <?= e($user->pseudo) ?>" class="img-circle" />
    			 	</div>
    			 </div>

    			  <div class="row">
    			 	<div class="col-sm-6">
    			 		<strong><?= e($user->pseudo) ?></strong> <br>
    			 		<a href="mailto:<?= e($user->email)  ?>"><?= e($user->email) ?> </a><br>

                        <?=
                            $user->ville && $user->pays ? '<i class="fas fa-location-arrow"></i>&nbsp;' .e($user->ville).' - '.e($user->pays).'<br>' : '';
                         ?> <a href="https://www.google.com/maps?q=<?= e($user->ville).' '.e($user->pays)  ?>" target="_blank">Voir sur Google Maps</a>
    			 	</div>
    			 	<div class="col-sm-6">
                        <?=
                            $user->twittter ? '<i class="fab fa-twitter"></i> <a href="//twitter.com/'.e($user->twittter).'">@'.e($user->twittter).'</a><br>' : '';
                         ?>
    			 		 <?=
                            $user->github ? '<i class="fab fa-github"></i> <a href="//github.com/'.e($user->github).'">'.e($user->github).'</a><br>' : '';
                         ?>
                         <?=
                            $user->sexe == "F" ? '<i class="fas fa-female"></i>' :'<i class="fas fa-male"></i>';
                         ?>
                          <?=
                            $user->disponible_pour_emploi ? 'Disponible pour emploi' :'Non disponible pour emploi';
                         ?>
    			 	</div>
        			 	<div class="col-md-12 well">
                            <h5>Petite biographie de <?= e($user->name)  ?></h5>
                            <p>
                                <?= $user->biographie ?nl2br(e($user->biographie)) : "Aucune biographie pour le moment..."; ?>
                            </p>
                        </div>
    			 </div>
    		</div>
    	</div>
      			
      		</div>
      		<div class="col-md-6">
      			<div class="panel panel-default">
    		<div class="panel-heading">
    			<h3 class="panel-title">Completer mon profil </h3>
    		</div>
    		<div class="panel-body">
    			<?php include('portion/p_erreur.php') ?>
    			<form data-parsley-validate method="POST" autocomplete="off" role="form">
    				<div class="row">
    					<div class="col-md-6">   						
    							<div class="form-group">
    								<label for="nom">Nom <span class="text-danger">*</span></label>
    								<input type="text" name="nom" class="form-control" id="nom" <?= afficherdonne('name') ?
 'value='.afficherdonne('name') : (e($user->name) ? 'value='.e($user->name) : 'placeholder= Simplice' )
 ?> required="required">
    							</div>

    					</div>
    						<div class="col-md-6">   						
    							<div class="form-group">
    								<label for="ville">Ville <span class="text-danger">*</span></label>
    								<input type="text" name="ville" class="form-control" id="ville" <?= afficherdonne('ville') ?
 'value='.afficherdonne('ville') : (e($user->ville) ? 'value='.e($user->ville) : 'placeholder= Abidjan' )
 ?> required="required">
    							</div>

    					</div>
    				</div>

    				<div class="row">
    					<div class="col-md-6">   						
    							<div class="form-group">
    								<label for="pays">Pays <span class="text-danger">*</span></label>
    								<input type="text" name="pays" class="form-control" id="pays" <?= afficherdonne('pays') ?
 'value='.afficherdonne('pays') : (e($user->pays) ? 'value='.e($user->pays) : 'placeholder= Mali')
 ?>  required="required">
    							</div>

    					</div>
    						<div class="col-md-6">   						
    							<div class="form-group">
    								<label for="sexe">Sexe <span class="text-danger">*</span></label>
    								<select name="sexe" class="form-control" id="sexe">
	    								<option value="H" <?= $user->sexe == "H" ? "selected" : "" ?>>
	    									Homme
	    								</option>
	    								<option value="F" <?= $user->sexe == "F" ? "selected" : "" ?>>
	    									Femme
	    								</option>
    								</select>
    							</div>

    					</div>
    				</div>


    				<div class="row">
    					<div class="col-md-6">   						
    							<div class="form-group">
    								<label for="twitter">Twitter</label>
    								<input type="text" name="twitter" class="form-control" id="twitter" <?= afficherdonne('twittter') ?
 'value='.afficherdonne('twittter') : (e($user->twittter) ? 'value='.e($user->twittter) : 'placeholder= Simplice' )
 ?>>
    							</div>

    					</div>
    						<div class="col-md-6">   						
    							<div class="form-group">
    								<label for="github">Github </label>
    								<input type="text" name="github" class="form-control" id="github"<?= afficherdonne('github') ?
 'value='.afficherdonne('github') : (e($user->github) ? 'value='.e($user->github) : 'placeholder= Simplice' )
 ?>>
    							</div>

    					</div>
    				</div>

    				<div class="row">
    					<div class="col-md-12">   						
    							<div class="form-group">
    								<label for="dispo_pr_emploi">
                                        <input type="checkbox" name="dispo_pr_emploi" id="dispo_pr_emploi" <?= $user->disponible_pour_emploi ? "checked" : "" ?>/>Disponible pour emploi?
    								    
    								</label>
    							</div>

    					</div>
    						
    				</div>

    				<div class="row">
    					<div class="col-md-12">   						
    							<div class="form-group">
    								<label for="bio">Biographie <span class="text-danger">*</span></label>
    								<textarea name="bio" id="bio" cols="30" rows="10" class="form-control"placeholder= "Je suis pour la technologie ..." ><?= afficherdonne('biographie') ? afficherdonne('biographie') : e($user->biographie)?></textarea>
    							</div>

    					</div>
    						
    				</div>
    				<input type="submit" class="btn btn-primary" value="Valider" name="update">
    			</form>

    			

    		</div>
    	</div>
      		</div>
      		
      	</div>
    	
       

      </div><!-- /.container -->

</div>

<?php include('portion/p_footer.php'); ?>

