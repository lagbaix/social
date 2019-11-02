<?php
session_start();
require('filter/filtre_auth.php');
require('config/database.php');
require('includes/fonctions.php');
require('includes/constantes.php');

if (!empty($_GET['id'])) {
	//recuperer les infos de l'utilisateurs dans la base de donnée
	$user = rechercher($_GET['id']);
	
	if (!$user) {
		redirect('index.php');
	}
}else{
	//rediriger l'utilisateur a partir de l'identifiant de sa session
	redirect('profile.php?id='.get_session('user_id'));
	
}

//si le formulaires à été soumis
if(isset($_POST['update'])){
	$erreurs = [];

	//si tous les champs ont été remplis
    if(!empty($_POST['nom']) && !empty($_POST['ville']) && !empty($_POST['pays']) && !empty($_POST['sexe'])){


        extract($_POST);
        //$id = get_session('user_id');

        $req = $con->prepare('UPDATE users SET
        						name = :nom, ville = :ville,
        						pays = :pays, sexe = :sexe, 
        						twittter = :twitter, github = :github,
        						 disponible_pour_emploi = :dispo,
        						biographie = :bio WHERE id =  :id');

        $req->execute([
            'nom' => e($nom),
            'ville' => e($ville),
            'pays' => e($pays),
            'sexe' => $sexe,
            'twitter' => e($twitter),
            'github' => e($github),
            'dispo' => !empty($dispo_pr_emploi)? '1' : '0',
            'bio' => e($bio),
            'id' => get_session('user_id')  
    
        ]);
       set_flash('Félicitations, Votre profil à été mis à jour!');
       redirect('profile.php?id='.get_session('user_id'));
   
}else{

            sauvedonne();
            $erreurs[]="Veuillez remplir tous les marquer d'un(*)"; 
}

} else{

	effacer_donnee(); // s'il vient d'arriver sur la page il faut vider tout les champs
}






require('views/profile.view.php');



