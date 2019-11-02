<?php
session_start();
require('filter/filtre_invite.php');
require('config/database.php');
require('includes/fonctions.php');
require('includes/constantes.php');

//si le formulaires à été soumis
if(isset($_POST['login'])){

	//si tous les champs ont été remplis
    if(!empty($_POST['identifiant']) && !empty($_POST['password'])){
        extract($_POST);

        $req = $con->prepare("SELECT id, pseudo FROM users WHERE (pseudo = :identifiant OR email = :identifiant) AND password = :password AND active = '1'");

        $req->execute([
            'identifiant' => $identifiant,
            'password' =>sha1($password)

        ]);

        $userHasBeenFound = $req->rowCount();
        if ($userHasBeenFound) {
            $user = $req->fetch(PDO::FETCH_OBJ);

            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_pseudo'] = $user->pseudo;

           redirect('profile.php?id='.$user->id);
        }else{
            set_flash('Conbinaison login ou mot de passe incorrect!', 'danger');
            sauvedonne();
        }
   
}

} else{

	effacer_donnee(); // s'il vient d'arriver sur la page il faut vider tout les champs
}

require('views/login.view.php');