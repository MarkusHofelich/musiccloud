<!DOCTYPE html>
<html>
  <head>
	<title>MusikWolke 7 | Profil</title>
		<!-- Eigenes Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/profil.css">
		<!-- Bootstrap Anfang -->
    <meta charset="UTF-8">
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
	die('<div class="col-md-12 text-center fehler">Bitte zuerst <a href="/login/login.php">einloggen</a><meta http-equiv="refresh" content="2; URL=../index.php"></div></div>');
	}
	?>
	<div class="col-md-12 head">
		<b>Mein Profil</b>&nbsp;		
	</div>
	<div class="col-md-2"></div><!-- Platzhalter -->
	<div class="col-md-8 text-center field">
	<?php if(!isset($_SESSION['userid'])) {echo '';}else{ $nickname = $_SESSION['nick'];  echo " Hallo $nickname";  }  ?>
	<br>
	
	<table class="table">
		<thead>
			<tr>
			  <th><b>Nickname<b></th>
			  <th>Email-Adresse</th>
			</tr>
		</thead>
		<?php 	
		$id = $_SESSION['userid'];
	include('db.php');

	// Create connection
	// Check connection
	echo '<br>';
	$sql = "SELECT * FROM users WHERE id = '$id'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<tbody><tr><td>" . $row["nickname"]."</td><td>" . $row["email"]. "</td><td> " . "</td></tr></tbody><br>";
		}
	} else {
		echo "0 results";
	}
	$conn->close();
	?>
	</table>
	<table class="table">
		<thead>
			<tr>
			  <th><b>Verwarnungen<b></th>
			  <th>Blockiert</th>
			</tr>
		</thead>
		<?php 	
		$id = $_SESSION['userid'];
	include('db.php');

	// Create connection
	// Check connection
	echo '<br>';
	$sql = "SELECT * FROM users WHERE id = '$id'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<tbody><tr><td>" . $row["verwarnung"]. "</td><td>" . $row["block"]. "</td></tr></tbody><br>";
		}
	} else {
		echo "0 results";
	}
	$conn->close();
	?>
	</table>
	
	
	
	
	

	</div>
	<div class="col-md-2"></div><!-- Platzhalter -->
	<?php 
	include('inbox.php');
	?>
	
	
	
	
	<!-- <img id="headpicture" src="test.png" height="60px" width="60px"></img> Pw nickname email verwarnungen blockiert-->

		

	
	
	
	
	
	
		<!-- Bootstrap Anfang [Immer an Schluss] -->
    <!-- jQuery (wird für Bootstrap JavaScript-Plugins benötigt) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
	<!-- Bootstrap Ende -->
	</body>
</html>