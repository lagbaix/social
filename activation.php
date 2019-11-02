<?php
session_start();
require('filter/filtre_invite.php');
require('config/database.php');
require('includes/fonctions.php');
//verification de l'existance du compte avant activation
if (!empty($_GET['p']) && utilise('pseudo', $_GET['p'], 'users') && !empty($_GET['token'])) {
		
		$pseudo = $_GET['p'];
		$token = $_GET['token'];

		$req = $con->prepare('SELECT email, password FROM users WHERE pseudo = ?');
		$req->execute([$pseudo]);
		$data = $req->fetch(PDO::FETCH_OBJ);
		
		//generer le token de verification
		$token_verif = sha1($pseudo.$data->email.$data->password);
		//si les deux token sont identique en modifie le active a 1
		if ($token == $token_verif) {
			$req = $con->prepare("UPDATE users SET active = '1' WHERE pseudo = ?");
			$req->execute([$pseudo]);

			//informer de l'utilisateur de l'activation du compte
			set_flash('Votre compte a été bel et bien activé!');
			// redirection de l'utilisateur vers sa page de connexion
			redirect('login.php');


			
		}else{
			set_flash('paramètre invalide', 'danger');
			redirect('index.php');
		}


}else{

	redirect('index.php');
}