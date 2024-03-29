
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Social network">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">


    <title>
      <?=
        isset($title) 
        ? $title .' - '.WEBSITE_NAME : WEBSITE_NAME.', Simple Rapide et Efficace';

      ?>
    </title>

    <!-- Bootstrap core CSS -->

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core CSS en local-->
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://kit.fontawesome.com/b652a357cc.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/main.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>-->
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    
  </head>

  <body>

<?php include('portion/p_menu.php'); ?>

<?php include('portion/p_message.php'); ?>