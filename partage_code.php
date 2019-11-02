<?php
session_start();
require('filter/filtre_auth.php');
require('config/database.php');
require('includes/fonctions.php');
require('includes/constantes.php');

//cloner le code 
//verifier si la variable $_GET['id']

if (!empty($_GET['id'])) {
        $q = $con->prepare('SELECT code FROM code WHERE id = ?');
    $success = $q->execute([$_GET['id']]);

    $data = $q->fetch(PDO::FETCH_OBJ);

    if (!$data) {
         $code = "";        
    }else{
        $code = $data->code;
    }
} else{
    $code = "";
}

//si le formulaire est soumis
if (isset($_POST['enregistrer'])) {
    if (!empty($_POST['code'])) {
        extract($_POST);
        $code = e($code);

        $q = $con->prepare('INSERT INTO code(code) VALUES(?)');

        $recu = $q->execute([$code]);
        if ($recu) {
            //recuperation de l'id du code
            $id = $con->lastInsertID();
            //Afficher le code source mais pour cela je le redirige bers une autre page appelle affichage-code

            redirect('affichage_code.php?id='.$id);

        }else{
            set_flash("Erreur lors de l'ajout du code source. Veuillez reessayer SVP!");
            redirect('partage_code.php');
        }
    }
    else {
        redirect('partage_code.php');
    }
}


require('views/partage_code.view.php');