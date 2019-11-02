<?php
session_start();
require('filter/filtre_invite.php');
require('config/database.php');
require('includes/fonctions.php');
require('includes/constantes.php');

//si le formulaires à été soumis
if(isset($_POST['enregistrer'])){

	//si tous les champs ont été remplis
    if(!empty($_POST['nom']) && !empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['pass_c']) ){

    	$erreurs = []; // Tableau permettant de contenir tous les erreurs

        extract($_POST);

        if (mb_strlen($pseudo) < 3) {
        	$erreurs[] = "Pseudo trop court! (Minimum 3 caractères)";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        	$erreurs[] = "Adresse email invalide!";
        }
         if (mb_strlen($password) < 6) {
        	$erreurs[] = "Mot de passe trop court! (Minimum 6 caractères)";
        }else {

        	if ($password != $pass_c) {
        		$erreurs[] = "Les deux Mots de passe ne concordent pas!";
        	}
        }

        if (utilise('pseudo', $pseudo, 'users')) {
        	
        	$erreurs[]= "Pseudo déja utilisé!";
        	        
        	 }

        if (utilise('email', $email, 'users')) {
        	
        	$erreurs[]= "Adresse E-mail déja utilisé!";
        	        
        	 }


        	 if (count($erreurs) == 0) {
        	 	//Envoi d'un mail d'activation
        	 	$to = $email;
        	 	$subject=WEBSITE_NAME.' - ACTIVATION DE COMPTE';
        	 	$password = sha1($password);

        	 	$token = sha1($pseudo.$email.$password);
        	 	ob_start();
        	 	require('templates/emails/activation.tmpl.php');
        	 	$content = ob_get_clean();
               /* $headers ='From: simplice@ita-education.cf' . "\r\n" .
                    'Reply-To: simplice@ita-education.cf' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion(); 
                $headers .= 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";*/
        	 	$headers= 'MIME-Version: 1.0' . "\r\n";
        	 	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        	 	mail($to, $subject, $content, $headers);
        	 	//Informer l'utilisateur de l'envoi d'un mail dans sa boite
        	 	set_flash("Mail d'activation envoyé!", 'success');

        	 	// enregistrement de l'utilisateur dans la base de donnée
        	 	$q = $con->prepare('INSERT INTO users(name, pseudo, email, password) VALUES(:name, :pseudo, :email, :password)');
        	 	$q->execute([
        	 		'name' => $nom,
        	 		'pseudo' => $pseudo,
        	 		'email' => $email,
        	 		'password' => $password
        	 	]);

        	 	//redirection vers la page de profil
        	 	redirect('index.php');
        	 	//message de bienvenue

        	 	
        	 }else{
        	 	sauvedonne();
        	 }

        
    }else {
    	$erreurs[] = "Veuillez SVP remplir tous les champs!";
    	sauvedonne();
    }


} else{

	effacer_donnee();// s'il vient d'arriver sur la page il faut vider tout les champs
}

require('views/inscription.view.php');