<!DOCTYPE html>
<html>
  <head>
	<title>MusikWolke 7 | Logout</title>
		<!-- Eigenes Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/logout.css">
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
	session_destroy();
 
	echo '<div class="col-md-12 text-center erfolgreich">Logout erfolgreich</div>';
	?>
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
