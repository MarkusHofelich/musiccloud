<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
  <head>
	<title>MusikWolke 7 | Login</title>
		<!-- Eigenes Stylesheet -->
	<link rel="stylesheet" type="text/css" href="/login/css/login.css">
		<link rel="stylesheet" type="text/css" href="/login/css/footer.css">
		
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
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=musicloud', 'root', '');
$ipadresse = $_SERVER['REMOTE_ADDR'];
	session_start();
	
if(isset($_SESSION["admin"])) {
   die('<div class="col-md-12 text-center erfolgmsg">Du bist bereits eingeloggt. <br>Weiter zur <a href="adminpanel/admin.php">Musiccloud</a> <meta http-equiv="refresh" content="1; URL=../adminpanel/admin.php"></div>');
   } else {
  
   

    if(isset($_GET['login'])) {
        $nickname = $_POST['nickname'];
        $passwort = $_POST['passwort'];
		$admin = 'ja';
        $statement = $pdo->prepare("SELECT * FROM users WHERE nickname = :nickname AND admin = :admin");
        $result = $statement->execute(array('nickname' => $nickname, 'admin' => $admin));
        $user = $statement->fetch();
        //Überprüfung des Passworts
		
        if ($user !== false && password_verify($passwort, $user['passwort']) && $admin === 'ja') {
                $_SESSION['admin'] = $user['id'];
				$_SESSION['nick'] = $user['nickname'];
                die('<div class="col-md-12 text-center erfolgmsg">Login erfolgreich. <br>Weiter zur <a href="/admin.php">Musiccloud</a> <meta http-equiv="refresh" content="1; URL=../adminpanel/admin.php"></div>');
        } else {
                echo  '<div class="col-md-12 text-center errormsg"><b>Nickname oder Passwort ist ung&uuml;ltig oder du bist kein Admin</b>';
        }
		
	}
   }
	?>
	<div class="col-md-12 text-center login"><h1>Login</h1></div>
	<div class="row">
		<div class="col-xs-6 col-xs-offset-3 col-md-4 col-md-offset-4 formular">
			<form action="?login=1" method="post">
				<div class="form-group">
					<label for="nickname">Nickname:</label>
					<input type="text" class="form-control" id="nickname" placeholder="Nickname" name="nickname">
				</div>
				<div class="form-group">
					<label for="passwort">Passwort:</label>
					<input type="password" class="form-control" id="passwort" placeholder="Passwort" name="passwort">
				</div>
					<button type="submit" class="btn btn-default" name="login">Anmelden</button>
			</form>
		</div>
	</div>
	<br><br><br><br>
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
