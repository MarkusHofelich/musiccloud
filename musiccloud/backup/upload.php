<!DOCTYPE html>
<html>
  <head>
	<title>Musiccloud Upload</title>
		<!-- Eigenes Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/upload.css">
	<link rel="stylesheet" type="text/css" href="css/dropup.css">
	<script src="js/dropup.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/basic.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- Bootstrap Ende // CSS überschreiben: command:value !important" // -->
	</head>
	<body>
	<?php
	session_start();
	if(!isset($_SESSION['userid'])) {
	die('Bitte zuerst <a href="/login/login.php">einloggen</a>');
	}
	?>
	<!-- Header Navbar Start -->
	<nav class="navbar navbar-default" role="navigation">
	  <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		</button>    
	  </div>
	  <a class="navbar-brand" href="#">Upload</a>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="index.php">Home</a></li>
			</ul>
				<ul class="nav navbar-nav">
				<li class="active"><a href="upload.php">Upload</a></li>
				<li><a href="musik.php">Musik</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="/login/logout.php">Abmelden</a></li>
			</ul>
		</div>
	</nav>
	<!-- Header Navbar Ende -->
	<br>
	<br>
	<br>
     <?php require_once('upload.html'); ?>


<?php
	include "footer.php";
	?> 
	<!-- Bootstrap Anfang [Immer an Schluss] -->
    <!-- jQuery (wird für Bootstrap JavaScript-Plugins benötigt) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
	<!-- Bootstrap Ende -->
	</body>
</html>
