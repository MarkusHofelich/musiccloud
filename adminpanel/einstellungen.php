<!DOYTYPE html>
<html>
 <head>
		<!-- Eigenes Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/einstellungen.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
		<!-- Einladungscode anzeigen --> 
	<?php include('../login/code.php'); ?>
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
<?php
	
$showseite = false;
$showformular = true;		
session_start();
 if(!isset($_SESSION['admin'])) {
 echo('Bitte erst <a href="/login/login.php">anmelden</a>');
 } else{
	 $showseite = true; 
	 $pdo = new PDO('mysql:host=127.0.0.1;dbname=musicloud', 'root', '');
 }
	


if($showseite) {
?>
<body>
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
				<li><a href="benutzer.php">Benutzer</a></li>
				<li class="active"><a href="einstellungen.php">Einstellungen</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><div class="navbar-brand navbar-right black"><?php if(!isset($_SESSION['userid'])) {echo '';}else{ $nickname = $_SESSION['nick'];  echo " Hallo $nickname";  }  ?></div></li>
			<li><a href="/login/logout.php">Abmelden</a></li>
			</ul>
		</div>
	</nav>
	<!-- Header Ende -->
	
	<!-- HIER KANNST DU LÖSCHEN CODES -->
		<?php 
	//Benutzer Löschen
	$showFormular3 = true;
	if(isset($_GET['delete'])) {
		$error3 = false;
		$id_delete = $_POST['id_delete'];

			
								
	if(strlen($id_delete) == 0) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte eine ID angeben</b></div><br>';
		$error3 = true;
	}	


	
	//Keine Fehler, wir können den code löschen
	if(!$error3) {	

		
		$result = $pdo->query("DELETE FROM einladungscode WHERE id = '$id_delete'");
		if($result) {		
			echo '<div class="text-center erfolgmsg">Code Deleted</div>';
			$showFormular = false;
		} else {
			echo '<div class="col-md-12 text-center errormsg"><b>Beim Abspeichern ist leider ein Fehler aufgetreten.</b></div><br>';
		}
	} 
	} 
	if($showFormular3) {
	?>
	
	<div class="col-md-12 delete">
		<h3 class="delete">Code löschen</h3>	
		<form action="?delete=1" method="post">
		<input type="text" id="id_delete" placeholder="ID" name="id_delete"></input>
		<button type="submit" value="delete" name="delete">Delete</button>
		</form>
	</div>
	<?php
	}
	?>
	
	
	
	<?php
 
   if(isset($_GET['change'])) {
	   $error = false;
	$code = $_POST['code'];
   
	
	if(!$error) { 
		$statement = $pdo->prepare("SELECT * FROM einladungscode WHERE codes = :code");
		$result = $statement->execute(array('code' => $code));
		$user = $statement->fetch();
		
		if($user !== false) {
			echo '<div class="col-md-12 text-center errormsg"><b>Dieser Einladungscode ist bereits vergeben</b></div><br>';
			$error = true;
		}
		
		if(strlen($code ) < 6) {
			echo 'Sry Gib mindestens 6 Buchstaben oder zeichen ein ';
			$error = true;
		}
		
		if(!$error) {	
		
		$statement = $pdo->prepare("INSERT INTO einladungscode (codes) VALUES (:code)");
		$result = $statement->execute(array('code' => $code));
		
		if($result) {		
			echo '<div class="text-center erfolgmsg">Du hast erfolreich einen Einladungscode: <b>' . $code . '</b> erstellt.</div>';
			$showformular = false;
		} else {
			echo '<div class="col-md-12 text-center errormsg"><b>Beim Erstellen ist leider ein Fehler aufgetreten.</b></div><br>';
		}
	} 
	}
}
	
	if($showformular) {
		?>

		<!-- Codes Die benutzt wurden -->
		<div class="col-md-12 text-center">
		Blockierte Einladungscodes
		
		<select><?php
// Create connection
include('db.php');
// Check connection
echo '<br>';
$sql = "SELECT codes, id FROM einladungscode WHERE used = 'ja'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	
		
		
		
         echo  "<option> ID : ".$row["id"]. " : " .$row["codes"]. " <br></option>";
		 
		
    }
} else {
    echo "0 results";
}
$conn->close();
?> 
</select>
		
		
		
		
		
		
	<!-- Code ändern und anzeigen -->
	<div class="col-md-12 text-center">
		Erstellte Einladungscodes
	<form action="#" method="post"> 
	<?php

?><select><?php
// Create connection
include('db.php');
// Check connection
echo '<br>';
$sql = "SELECT codes,id FROM einladungscode";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	
		
		
		
         echo  "<option> ID :". $row["id"] . "  :    " .  $row["codes"]. "<br></option>";
		 
		
    }
} else {
    echo "0 results";
}
$conn->close();
?> 
</select>
	</form>
	</div>
	<div class="col-md-12 text-center">
		Einladungscode erstellen
	<form action="?change=1" method="POST">
		<input type="text" id="code" placeholder="Einladungscode" name="code"></input>
		<button type="submit" value="absenden">speichern</button>
	</form>
	</div>
	<?php
	}
}
?>

	<?php

	
	 include "footer.php";
	
	
	?> 
	<!-- Bootstrap Anfang [Immer an Schluss] -->
    <!-- jQuery (wird f?r Bootstrap JavaScript-Plugins ben?tigt) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
	<!-- Bootstrap Ende -->
</body>
</html>