<?php 



	//fonction permettant d'echapper les données sauvegarder

if (!function_exists('e')) {
	function e($string){
		if ($string) {
			return strip_tags($string);
		}
		
		}
	}



//Fonction de verification de l'existence d'un champ dans la base de donnée
if (!function_exists('utilise')) {

	function utilise($field, $value, $table){

		global $con;

		$q = $con->prepare("SELECT id FROM $table WHERE $field = ? ");
		$q->execute([$value]);

		$count = $q->rowCount();
		$q->closeCursor();
		return $count;
	}

	
}

//fonction permettant d'afficher les messages 

if (!function_exists('set_flash')) {
	function set_flash($message, $type = 'info'){
		$_SESSION['notification']['message'] = $message;
		$_SESSION['notification']['type'] = $type;
	}
}


//fonction de redirection avec exit vers une page pour permettre l'affiche des messages

if (!function_exists('redirect')) {
	function redirect($page){
		header('Location:'.$page);
		exit;
	}
}



//fonction de de sauvegarde des informations en session

if (!function_exists('sauvedonne')) {
	function sauvedonne(){
		foreach ($_POST as $key => $value) {
			if (strpos($key, 'pass') === false) {

				$_SESSION['input'][$key] = $value;
			}
			
		}
	}
}

//fonction permettant d'afficher les données sauvegarder

if (!function_exists('afficherdonne')) {
	function afficherdonne($key){
		if (!empty($_SESSION['input'][$key])) {
				return e($_SESSION['input'][$key]);
			
		}else{
			return null;
		}
		
		}
	}

//fonction pour effacer les données sauvegarder dans la session
if (!function_exists('effacer_donnee')) {
	function effacer_donnee(){
		
		if (isset($_SESSION['input'])) {
			$_SESSION['input'] = [];
		}
	}
}

//fonction pour verifier la page active et gerer l'etat actif de nos lien
if (!function_exists('set_active')) {
	function set_active($file, $class = 'active'){
		$page = explode('/', $_SERVER['SCRIPT_NAME']);
		$page = array_pop($page);
		if ($page == $file.'.php') {
			return $class;
		}else{
			return "";
		}
		
	}
}

//

