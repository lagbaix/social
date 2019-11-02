<?php $title="Partage de codes sources"; ?>
<?php include('portion/p_header.php'); ?>
<div class="main-content">
    <!-- affichage des message d'erreurs -->
        <?php include('portion/p_erreur.php')?>
        <!-- fin affichage des message d'erreurs -->
      <div  id="partage-code">
        <form action="" method="POST" autocomplete="off">
            <textarea name="code" id="code" placeholder="Entrer votre code ici" required="required"><?= $code;  ?></textarea>
            <div class="btn-group" id="fix">   
            <a href="partage_code.php" class="btn btn-danger"> Tout effacer!</a>
            <input type="submit" class="btn btn-success" name="enregistrer" value="Enregistrer">
            </div>            
        </form>
      </div>
</div><!-- /.main-content -->
<!-- </html> -->

 <!-- Bootstrap core JavaScript-->
    <!--  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- local chargement -->
    <!-- <script src="../assets/js/bootstrap.min.js"></script> -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>

     <!-- chargement du script taby pour utiliser la tabulation -->
     <script src="assets/js/taby.js"></script>

 <!-- Script permettant d'utiliser la tabulation au niveau du textarea -->
     <script>
         $("#code").tabby();
         $("#code").height( $(window).height() - 50);
     </script>

    
    

    