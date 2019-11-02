<?php
session_start();
require('filter/filtre_auth.php');
require('config/database.php');
require('includes/fonctions.php');
require('includes/constantes.php');


if (!empty($_GET['id'])) {
    # code...
    $q = $con->prepare('SELECT code FROM code WHERE id = ?');
    $success = $q->execute([$_GET['id']]);
    
    $data = $q->fetch(PDO::FETCH_OBJ);
    if (!$data) {
        redirect('partage_code.php');
    }
    
}else{
    redirect('partage_code.php');
}


require('views/affichage_code.view.php');
