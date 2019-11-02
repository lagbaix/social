<?php 
require('includes/fonctions.php');
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_pseudo'])) {
	redirect('login.php');
}