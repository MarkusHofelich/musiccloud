<!DOYTYPE html>

<html>
 <head>
		<!-- Eigenes Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/admin.css">
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

<!-- Header Navbar Start -->
<?php if($showseite) { ?>
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
				<li class="active"><a href="admin.php">Home</a></li>
			</ul>
				<ul class="nav navbar-nav">
				<li><a href="benutzer.php">Benutzer</a></li>
				<li><a href="einstellungen.php">Einstellungen</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><div class="navbar-brand navbar-right black"><?php if(!isset($_SESSION['userid'])) {echo '';}else{ $nickname = $_SESSION['nick'];  echo " Hallo $nickname";  }  ?></div></li>
			<li><a href="/login/logout.php">Abmelden</a></li>
			</ul>
		</div>
	</nav>
<!-- Header Ende -->
<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=markus-testbase', 'markus-testbase', '1');
$statement = $pdo->prepare("SELECT COUNT(*) AS anzahl FROM users");
$statement->execute();  
$row = $statement->fetch();
echo "Es sind ".$row['anzahl']." Benutzer Registriert";
echo '<br>';
$statement = $pdo->prepare("SELECT COUNT(*) AS anzahl1 FROM einladungscode");
$statement->execute();  
$row1 = $statement->fetch();
echo "Es sind ".$row1['anzahl1']." Einladungscode definiert";
?>
<?php }
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