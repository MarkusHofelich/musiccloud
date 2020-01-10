<!DOCTYPE html>
<html>
  <head>
	<title>MusikWolke 7 | Home</title>
		<!-- Eigenes Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
		<!-- Bootstrap Anfang -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
	die('<div class="col-md-12 text-center fehler">Bitte zuerst <a href="/login/login.php">einloggen</a><meta http-equiv="refresh" content="2; URL=../index.php"></div>');
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
	  <a class="navbar-brand" href="#">Home</a>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-left">
				<li class="active"><a href="index.php">Home</a></li>
			</ul>
				<ul class="nav navbar-nav">
				<li><a href="upload.php">Upload</a></li>
				<li><a href="musik.php">Musik</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="#" class="navbar-nav color"><?php if(!isset($_SESSION['userid'])) {echo '';}else{ $nickname = $_SESSION['nick'];  echo " Hallo $nickname";  }  ?></a></li>
			<li><a href="/login/logout.php">Abmelden</a></li>
			</ul>
		</div>

	</nav>
	
	<?php // Work in Progress
	
$pdo = new PDO('mysql:host=127.0.0.1;dbname=musicloud', 'root', '');
		if(isset($_GET['change'])) {
		$error1 = false;
		$nick_change = $_POST['nick_change'];
				$pw_change = $_POST['passwort_change'];
				$email_change = $_POST['email_change'];
				$id_change = $_SESSION['userid'];
				$pw_sicher = $_POST['pw_sicher'];
				$nick = $_POST['nick'];
								
	

	
	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error1) {	
	      
	        $statement1 = $pdo->prepare("SELECT * FROM users WHERE nickname = :nick");
        $result1 = $statement1->execute(array('nick' => $nick));
        $user = $statement1->fetch();
	if($user !== false && password_verify($pw_sicher, $user['passwort'])) {
		$passwort_hash = password_hash($pw_change, PASSWORD_DEFAULT);
		$result2 = $pdo->query("UPDATE users SET passwort = '$passwort_hash', nickname = '$nick_change', email = '$email_change' WHERE id = '$id_change'");
		if($result2) {		
			echo '<div class="text-center erfolgmsg">You have Succesfully changed your profile</div>';
			$showFormular = false;
		} else {
			echo '<div class="col-md-12 text-center errormsg"><b>Beim Abspeichern ist leider ein Fehler aufgetreten.</b></div><br>';
		}
	}else{
		echo 'Aktuelles Passwort falsch';
	}  
		}
		}
	
	
	
	?>	
	<?php
	/*
		<form action="?change=1" method="post">
		<h3 class="edit">Benutzer ändern</h3>	
	    <input type="text" id="nick" placeholder="DeinNickname" name="nick"></input>
		<input type="text" id="nick_change" placeholder="Dein Neuer NickName" name="nick_change"></input>
		<input type="password" id="passwort_change" placeholder="New Password" name="passwort_change"></input>
		<input type="email" id="email_change" placeholder="New Email" name="email_change"></input>
		<br><br><br>
		<h><b>Dein Aktuelles password zur sicherheit : </b></h>
		
		<input type="password" id="pw_sicher" placeholder="Aktuelles Passwort" name="pw_sicher"></input>
	
		<button type="submit" value="change" name="change">speichern</button>
	</div>
	</form>
	*/
	?>
	<?php
	include "footer.php";
	?> 
	<!-- Header Navbar Ende -->
	<!-- Bootstrap Anfang [Immer an Schluss] -->
    <!-- jQuery (wird für Bootstrap JavaScript-Plugins benötigt) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
	<!-- Bootstrap Ende -->
	</body>
</html>
