<!DOCTYPE html>
<html>
  <head>
	<title>MusikWolke 7 | Upload</title>
		<!-- Eigenes Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/upload.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/basic.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet" />
	<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
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
			<li><a href="#" class="navbar-nav color"><?php if(!isset($_SESSION['userid'])) {echo '';}else{ $nickname = $_SESSION['nick'];  echo " Hallo $nickname";  }  ?></a></li>
			<li><a href="/login/logout.php">Abmelden</a></li>
			</ul>
		</div>
	</nav>
	<!-- Header Navbar Ende -->
	<br>
	<br>
	<br>
	<?php 
	if(isset($_GET['upload'])) {
include '../adminpanel/db.php';
// A list of permitted file extensions
$allowed = array('mp3', 'aac', 'mp4','audio/');
$id = $_SESSION['userid'];
$filenamee = $_FILES['name']; // IST EXTRA FALSCH GESCHRIEBEN
if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/'.$_FILES['upl']['name'])){
		
		$conn->query("INSERT INTO files (id, file_name, uploaded) VALUES('".$id."','".$filenamee."','".date("Y-m-d H:i:s")."')");
		echo '{"status":"success"}';
		exit;
	}
}
echo 'Du hast erfolgreich etwas hochgeladen';
exit;
		
	}
	?>
     <form id="upload" method="post" action="?upload=1" enctype="multipart/form-data">
			<div id="drop">
				Drop Here

				<a>Browse</a>
				<input type="file" name="upl" multiple />
				<button type="submit">Hochladen</button>
			</div>

			<ul>
				<!-- The file uploads will be shown here -->
			</ul>

		</form>


<?php
	include "footer.php";
	?> 
	<!-- Bootstrap Anfang [Immer an Schluss] -->
    <!-- jQuery (wird für Bootstrap JavaScript-Plugins benötigt) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
	<!-- Bootstrap Ende -->
		<!-- JavaScript Includes -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="assets/js/jquery.knob.js"></script>

		<!-- jQuery File Upload Dependencies -->
		<script src="assets/js/jquery.ui.widget.js"></script>
		<script src="assets/js/jquery.iframe-transport.js"></script>
		<script src="assets/js/jquery.fileupload.js"></script>
		
		<!-- Our main JS file -->
		<script src="assets/js/script.js"></script>
	</body>
</html>
