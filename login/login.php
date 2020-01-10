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
	<div class="ipwarning text-center col-md-12">Zu Sicherheitszwecken wird Ihre IP Adresse gespeichert. Sie akzeptieren automatisch unsere <a href="../formulare/hilfe.php">AGB</a>, indem sie sich einloggen.</div>
	<?php
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=musicloud', 'root', '');
$ipadresse = $_SERVER['REMOTE_ADDR'];
	session_start();
	
if(isset($_SESSION["userid"])) 
   {   
       
   die('<div class="col-md-12 text-center erfolgmsg">Du bist bereits eingeloggt. <br>Weiter zur <a href="musiccloud/index.php">Musiccloud</a> <meta http-equiv="refresh" content="1; URL=../musiccloud/index.php"></div>');
   } else {
  
   

    if(isset($_GET['login'])) {
        $nickname = $_POST['nickname'];
        $passwort = $_POST['passwort'];
		$block = 0;
		$verwarnung = 0;
        $statement = $pdo->prepare("SELECT * FROM users WHERE nickname = :nickname AND block = :block");
        $result = $statement->execute(array('nickname' => $nickname, 'block' => $block));
        $user = $statement->fetch();
        //Überprüfung des Passworts
			$sql = "SELECT * FROM users WHERE verwarnung = '3'";
			$result1 = $pdo->query($sql);
			
		// output data of each row
		if($result1) {
			$result2 = $pdo->query("UPDATE users SET block = '1' WHERE verwarnung = '3'");
		}
	
		
		
        if ($user !== false && password_verify($passwort, $user['passwort']) && $block === 0 ) {
			
                $_SESSION['userid'] = $user['id'];
				$_SESSION['nick'] = $user['nickname'];
                die('<div class="col-md-12 text-center erfolgmsg">Login erfolgreich. <br>Weiter zur <a href="musiccloud/index.php">Musiccloud</a> <meta http-equiv="refresh" content="1; URL=../musiccloud/index.php"></div>');
        } else {
                echo  '<div class="col-md-12 text-center errormsg"><b>Nickname oder Passwort ist ung&uuml;ltig oder du wurdest gesperrt (<a href="../formulare/hilfe.php">Hilfe beim Login</a>)</b>';
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
	<div class="col-md-3"></div>
	<div class="col-md-6 text-center info">
		<h2><b>Willkomme auf der MusikWolke 7</b></h2><br>
		<br><h3>Du fragst dich was die MusikWolke 7 ist?</h3><br>
		<h4>MusikWolke 7 ist eine Musik Sharing Plattform, du kannst Musik hochladen, teilen
		<br>und sogar von anderen Usern die hochgeladene Musik anh&#xf6;ren.</h4>
		<br><h4><b>Bitte lesen sie sich unsere <a href="/formulare/hilfe.php">AGB</a> durch, bevor sie sich registrieren.</b></h4>
	</div>
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
