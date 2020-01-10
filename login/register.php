<?php
	session_start();
	require('../datenbank.php');
?>
<html>
  <head>
	<title>MusikWolke 7 | Registrierung</title>
		<!-- Eigenes Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/register.css">
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
<div>
	<?php
	$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
	if(isset($_GET['register'])) {
	$error = false;
	$email = $_POST['email'];
	$passwort = $_POST['passwort'];
	$passwort2 = $_POST['passwort2'];
	$code = $_POST['code'];
	$nickname = $_POST['nickname'];
	$vorname = $_POST['vorname'];
	$ipadresse = $_SERVER['REMOTE_ADDR'];
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte eine g&#252;ltige E-Mail-Adresse eingeben</b></div><br>';
		$error = true;
	}
	if(strlen($code) == 0) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte einen Einladungscode angeben</b></div><br>';
		$error = true;
	} 	
	if(strlen($passwort) == 0) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte ein Passwort angeben</b></div><br>';
		$error = true;
	}
	if($passwort != $passwort2) {
		echo '<div class="col-md-12 text-center errormsg"><b>Die Passwörter müssen übereinstimmen</b></div><br>';
		$error = true;
	}
	if(strlen($nickname) == 0) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte ein Nickname angeben</b></div><br>';
		$error = true;
	}
			
	if(strlen($vorname) == 0) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte ein Vorname angeben</b></div><br>';
		$error = true;
	}
			
	

	//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
	if(!$error) { 
		$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		$result = $statement->execute(array('email' => $email));
		$user = $statement->fetch();
		
		if($user !== false) {
			echo '<div class="col-md-12 text-center errormsg"><b>Diese E-Mail-Adresse ist bereits vergeben</b></div><br>';
			$error = true;
		}	
	}
	
	
	if(!$error) { 
		$statement = $pdo->prepare("SELECT * FROM einladungscode WHERE codes = :codes");
		$result = $statement->execute(array('codes' => $code));
		$codes = $statement->fetch();
		
		if($codes === false) {
			
			echo '<div class="col-md-12 text-center errormsg"><b>Dieser Einladungscode ist falsch</b></div><br>';
			$error = true;
			
		}
			
	}
		if(!$error) { 
		$used = 'ja';
		$statement = $pdo->prepare("SELECT * FROM einladungscode WHERE used = :used");
        $result = $statement->execute(array('used' => $used));
        $user = $statement->fetch();
		
		if($used === 'ja') {
			
			echo '<div class="col-md-12 text-center errormsg"><b>Dieser Einladungscode wurde schon benutzt</b></div><br>';
			$error = true;
			
		}
			
	}
		   //Überprüfe, dass der Nickname noch nicht registriert wurde
	if(!$error) { 
		$statement = $pdo->prepare("SELECT * FROM users WHERE nickname = :nickname");
		$result = $statement->execute(array('nickname' => $nickname));
		$nick = $statement->fetch();
		
		if($nick !== false) {
			echo '<div class="col-md-12 text-center errormsg"><b>Dieser Nickname ist bereits vergeben</b></div><br>';
			$error = true;
		}	
	} 
	
	
	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error) {	
		$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
		
		$update = $pdo->query("UPDATE einladungscode SET used = 'ja' WHERE codes = '$code'");
		$statement = $pdo->prepare("INSERT INTO users (email, passwort, vorname, nickname, ip) VALUES (:email, :passwort, :vorname, :nickname, :ip)");
		$result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash, 'vorname' => $vorname, 'nickname' => $nickname, 'ip' => $ipadresse));
		
		if($result && $update) {		
			echo '<div class="text-center erfolgmsg">Du wurdest erfolgreich registriert. <br><a href="/login/login.php">Zum Login</a> <meta http-equiv="refresh" content="2; URL=/login/login.php"></div>';
			$showFormular = false;
		} else {
			echo '<div class="col-md-12 text-center errormsg"><b>Beim Abspeichern ist leider ein Fehler aufgetreten.</b></div><br>';
		}
	} 
	} 
 
	if($showFormular) {
	?>
	<div class="row">
		<div class="col-md-12 text-center login"><h1>Registrierung</h1></div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-xs-offset-3 col-md-4 col-md-offset-4 formular">
			<form action="?register=1" method="post">
				<div class="form-group">
					<label for="nickname">Nickname*</label>
					<input type="nickname" class="form-control" id="nickname" placeholder="Nickname" name="nickname">
					<label for="vorname">Name*</label>
					<input type="vorname" class="form-control" id="vorname" placeholder="Name" name="vorname">
					<label for="Email-Adresse">Email-Adresse*</label>
					<input type="email" class="form-control" id="Email-Adresse" placeholder="E-Mail-Adresse" name="email">
				</div>
				<div class="form-group">
					<label for="passwort">Passwort*</label>
					<input type="password" class="form-control" id="passwort" placeholder="Passwort" name="passwort">
					<label for="passwort2">Passwort wiederholen*</label>
					<input type="password" class="form-control" id="passwort2" placeholder="Passwort wiederholen" name="passwort2">
					
				</div>
				<div class="form-group">
					<label for="code">Einladungscode eingeben**</label>
					<input type="code" class="form-control" id="code" placeholder="Einladungscode" name="code">
				</div>
					<button type="submit" class="btn btn-default" name="registrieren">Registrieren</button>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<h6>* Pflichtfeld</h6>
		</div>
		<div class="col-md-12 text-center">
			<h6>** Diesen Code (=<b>Spamschutz</b>) kannst du auf Anfrage bekommen (Hilfe und dort ein Ticket erstellen)</h6>
		</div>
	</div>
<?php
} //Ende von if($showFormular)
?>
	<?php
	include "footer.php";
	?> 
</div>	
	<!-- Bootstrap Anfang [Immer an Schluss] -->
    <!-- jQuery (wird für Bootstrap JavaScript-Plugins benötigt) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
	<!-- Bootstrap Ende -->
	</body>
</html>
