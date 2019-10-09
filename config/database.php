<?php 


define('DB_HOST', 'localhost');
define('DB_NAME', 'social');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');


try{
$con = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);

$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){

die('ERREUR:'.$e->getMessage());
}


/**try{
$con = new PDO("mysql:host=localhost;dbname=social", "root", "");

}catch(PDOException $e){

die('ERREUR:'.$e->getMessage());
}**/

 ?>
