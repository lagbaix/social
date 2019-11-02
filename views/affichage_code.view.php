<?php $title="Affichage de codes sources"; ?>
<?php include('portion/p_header.php'); ?>
<div class="main-content">
      <div  id="partage-code">
        <pre>
            <?= $data->code; ?>
        </pre>
        <div class="btn-group" id="fix">   
            <a href="partage_code.php?id=<?= $_GET['id'] ?>" class="btn btn-warning"> Cloner</a>
            <a href="partage_code.php" class="btn btn-primary"> Nouveau</a>            
            </div>  
      </div>
</div><!-- /.main-content -->

<?php include('portion/p_footer.php'); ?>

    
    

    