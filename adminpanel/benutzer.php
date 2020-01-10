	<!DOYTYPE html>
<html>
 <head>
		<!-- Eigenes Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/benutzer.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<title>MusikWolke 7 | Adminpanel</title>
		<!-- Bootstrap Anfang -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- Bootstrap Ende // CSS ?berschreiben: command:value !important" // -->
</head>		
<body>
	<?php

	session_start();
	$showseite = false;
	 if(!isset($_SESSION['admin'])) {
	 echo('Bitte erst <a href="/login/login.php">anmelden</a>');
	 } else {
		 $showseite = true;
	 }
		

		$pdo = new PDO('mysql:host=127.0.0.1;dbname=musicloud', 'root', '');
		
		
			
	if($showseite) {
		
		?>
		<!-- Navbar -->
	<nav class="navbar navbar-default grey" role="navigation">
	  <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		</button>    
	  </div>
	  <a class="navbar-brand red hidden-xs hidden-sm" href="#">Adminpanel</a>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="admin.php">Home</a></li>
			</ul>
				<ul class="nav navbar-nav">
				<li class="active"><a href="benutzer.php">Benutzer</a></li>
				<li><a href="einstellungen.php">Einstellungen</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><div class="navbar-brand navbar-right black"><?php if(!isset($_SESSION['userid'])) {echo '';}else{ $nickname = $_SESSION['nick'];  echo " Hallo $nickname";  }  ?></div></li>
			<li><a href="/login/logout.php">Abmelden</a></li>
			</ul>
		</div>
	</nav>
	<!-- Ende Nav -->
	<!-- Aktion auswählen -->
	<form action="?selectedValues=1" method="POST">
		<select name="selected">
		<option value="users" selected="true">[Benutzer] anzeigen</option>
		<option value="blocks">[Blockierte Benutzer] anzeigen</option>
			<option value="placeholder" >--- Benutzer [&#xe4;ndern] ---</option>
		<option value="changeid" >[ID]</option>
		<option value="changename">[Name]</option>
		<option value="changenick">[Nickname]</option>
		<option value="changepw">[Passwort]</option>
		<option value="changeemail">[Email]</option>
			<option value="placeholder">--- Benutzer [erstellen/löschen] ---</option>
		<option value="registeruser">[Benutzer] erstellen</option>
		<option value="deleteuser">[Benutzer] l&#xf6;schen</option>
			<option value="placeholder">--- Benutzer [blockieren/freigeben] ---</option>
		<option value="blockid">[ID] blockieren</option>
		<option value="blocknick">[Benutzer] blockieren</option>
		<option value="unblockid">[ID] freigeben</option>
		<option value="unblockuser">[Benutzer] freigeben // Bitte noch machen! //</option>
    	</select>
	<input type="submit" value="Ausw&#xe4;hlen" />
	</form>
	<!-- // -->
	<?php 
		$showchangeemail = false;
		$showchangeid = false;
		$showchangepw = false;
		$showchangenick = false;
		$showchangename = false;
		$showdelete = false;
		$showregisteruser = false;
		$showblockid = false;
		$showblocknick = false;
		$showblocks = false;
		$showunblock = false;
		$showusers = false;
		include('/includes/mysqlup.php')
	?>
	<?php
	if(isset($_GET['selectedValues'])) {
	switch($_POST['selected']){
	case 'changeid':
		$showchangeid = true;
	break;
	case 'changename':
		$showchangename = true;
	break;
	case 'changenick':
		$showchangenick = true;
	break;
	case 'changepw':
		$showchangepw = true;
	break;
	case 'changeemail':
		$showchangeemail = true;
	break;
	case 'deleteuser':
		$showdelete = true;
	break;
	case 'registeruser' :
	$showregisteruser = true;
	break;
	case 'blockid':
		$showblockid = true;
	break;
	case 'blocknick':
		$showblocknick = true;
	break;
	case 'unblockid' :
		$showunblock = true;
	break;
	case 'blocks' :
		$showblocks = true;
	break;
	case 'users' :
		$showusers = true;
	break;
	case 'placeholder' :
		echo '<b>Du hast nur einen Platzhalter ausgewählt.</b>';
		break;
	default:
		echo '<b>Es trat leider ein Fehler auf.</b>';
	}
	}
		
		
		?>
	<!-- // -->	
	<?php
	include('/includes/showusers.php');
	include('/includes/changeemail.php');
	include('/includes/changename.php');
	include('/includes/changepw.php');
	include('/includes/changenick.php');
	include('/includes/changeid.php');
	include('/includes/deleteuser.php');
	include('/includes/registeruser.php');
	include('/includes/blockid.php');
	include('/includes/blocknick.php');
	include('/includes/unblockid.php');
	include('/includes/showblocks.php');
	?>
	<!-- // -->
	<?php
	 }
	 ?>	
	<!-- Ende Auswahl -->
    <?php
	include 'footer.php';
	?>	
	<!-- Bootstrap Anfang [Immer an Schluss] -->
    <!-- jQuery (wird f?r Bootstrap JavaScript-Plugins ben?tigt) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
	<!-- Bootstrap Ende -->
	</body>
</html>