<?php
 $pdo = new PDO('mysql:host=127.0.0.1;dbname=musicloud', 'root', '');
// Unblock
	if(isset($_GET['unblock'])) {
		$errors = false;
		$id_unblock = $_POST['id_unblock'];		
	
	
	

	
	
	//Keine Fehler, wir können den Nutzer Blockieren
	
		if(!$errors) {	
		
		$result1 = $pdo->query("UPDATE users SET block = '0' WHERE id = '$id_unblock'");
			
		if($result1) {		
			echo '<div class="text-center erfolgmsg">User wurde entblockt</div>';
			$showFormular2 = false;
		}
	}

	
	}
	//Block per nick
	
		if(isset($_GET['blocknick'])) {
		$error2 = false;
		$nick_block = $_POST['nick_block'];				
	
	
	

	
	
	//Keine Fehler, wir können den Nutzer Blockieren 
		if(!$error2) {	
		
		$result1 = $pdo->query("UPDATE users SET block = '1' WHERE nickname = '$nick_block'");
			
		if($result1) {		
			echo '<div class="text-center erfolgmsg">User wurde geblockt</div>';
			$showFormular2 = false;
		}
	} 
		
	}
	//Block per id
		if(isset($_GET['blockid'])) {
		$error2 = false;
		$id_block = $_POST['id_block'];			
	
	
	

	
	
	//Keine Fehler, wir können den Nutzer Blockieren 
		if(!$error2) {	
		
		$result1 = $pdo->query("UPDATE users SET block = '1' WHERE id = '$id_block'");
			
		if($result1) {		
			echo '<div class="text-center erfolgmsg">User wurde geblockt</div>';
			$showFormular2 = false;
		}
	} 
		
	}
	//registeruser
	
		if(isset($_GET['register'])) {
	$error = false;
	$email = $_POST['email'];
	$passwort = $_POST['passwort'];
	$nickname = $_POST['nickname'];
	$vorname = $_POST['vorname'];
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte eine Email-Adresse angeben</b></div><br>';
		$error = true;
	} 	
	if(strlen($passwort) == 0) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte ein Passwort angeben</b></div><br>';
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
		
		$statement = $pdo->prepare("INSERT INTO users (email, passwort, vorname, nickname) VALUES (:email, :passwort, :vorname, :nickname)");
		$result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash, 'vorname' => $vorname, 'nickname' => $nickname));
		
		if($result) {		
			echo '<div class="text-center erfolgmsg">Benutzer erfolgreich erstellt</div>';
			$showFormular = false;
		} else {
			echo '<div class="col-md-12 text-center errormsg"><b>Beim Abspeichern ist leider ein Fehler aufgetreten.</b></div><br>';
		}
	} 
	} 
	
	//changepw
	
	
		if(isset($_GET['changepw'])) {
		$error1 = false;
		$id_change = $_POST['oldid_change'];
				$pw_change = $_POST['pw_change'];
				
								
	

	
	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error1) {	
		$passwort_hash = password_hash($pw_change, PASSWORD_DEFAULT);
		$result2 = $pdo->query("UPDATE users SET passwort = '$passwort_hash' WHERE id = '$id_change'");
		if($result2) {		
			echo '<div class="text-center erfolgmsg">Users password was changed</div>';
			$showFormular = false;
		} else {
			echo '<div class="col-md-12 text-center errormsg"><b>Beim Abspeichern ist leider ein Fehler aufgetreten.</b></div><br>';
		}
	} 
	} 
	
	//changenick
	
		if(isset($_GET['changenick'])) {
		$error1 = false;
		$id_change = $_POST['oldid_change'];
				$nick_change = $_POST['nick_change'];
				
								

	

	
	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error1) {	
		
		$result2 = $pdo->query("UPDATE users SET nickname = '$nick_change' WHERE id = '$id_change'");
		if($result2) {		
			echo '<div class="text-center erfolgmsg">Users Nickname changed</div>';
			$showFormular = false;
		} else {
			echo '<div class="col-md-12 text-center errormsg"><b>Beim Abspeichern ist leider ein Fehler aufgetreten.</b></div><br>';
		}
	} 
	} 
	
	// changename
	
		if(isset($_GET['changename'])) {
		$error1 = false;
		$id_change = $_POST['oldid_change'];
				$name_change = $_POST['name_change'];
				
								
	
	

	
	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error1) {	
		
		$result2 = $pdo->query("UPDATE users SET vorname = '$name_change' WHERE id = '$id_change'");
		if($result2) {		
			echo '<div class="text-center erfolgmsg">Users Name changed</div>';
			$showFormular = false;
		} else {
			echo '<div class="col-md-12 text-center errormsg"><b>Beim Abspeichern ist leider ein Fehler aufgetreten.</b></div><br>';
		}
	} 
	} 
	
	//changeid
	
		if(isset($_GET['changeid'])) {
		$error1 = false;
		$id_change = $_POST['id_change'];
				$oldid_change = $_POST['oldid_change'];
				
								

	
	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error1) {	
		
		$result2 = $pdo->query("UPDATE users SET id = '$id_change' WHERE id = '$oldid_change'");
		if($result2) {		
			echo '<div class="text-center erfolgmsg">Users ID changed</div>';
			$showFormular = false;
		} else {
			echo '<div class="col-md-12 text-center errormsg"><b>Beim Abspeichern ist leider ein Fehler aufgetreten.</b></div><br>';
		}
	} 
	} 
	//changeemail
		if(isset($_GET['changeemail'])) {
		$error1 = false;
		$id_change = $_POST['id_change'];
				$email_change = $_POST['email_change'];
				
								
	
		if(!filter_var($email_change, FILTER_VALIDATE_EMAIL)) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte eine Email-Adresse angeben</b></div><br>';
		$error1 = true;
	} 	 
	
	
	
		//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
	if(!$error1) { 
		$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		$result = $statement->execute(array('email' => $email_change));
		$user = $statement->fetch();
		
		if($user !== false) {
			echo '<div class="col-md-12 text-center errormsg"><b>Diese E-Mail-Adresse ist bereits vergeben</b></div><br>';
			$error1 = true;
		}	
	}
	

	
	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error1) {	
		
		$result2 = $pdo->query("UPDATE users SET email = '$email_change' WHERE id = '$id_change'");
		if($result2) {		
			echo '<div class="text-center erfolgmsg">Users Email changed</div>';
			$showFormular = false;
		} else {
			echo '<div class="col-md-12 text-center errormsg"><b>Beim Abspeichern ist leider ein Fehler aufgetreten.</b></div><br>';
		}
	} 
	} 
	
	
	//DELETE
	
		if(isset($_GET['delete'])) {
		$error3 = false;
		$id_delete = $_POST['id_delete'];

			
								
	if(strlen($id_delete) == 0) {
		echo '<div class="col-md-12 text-center errormsg"><b>Bitte eine ID angeben</b></div><br>';
		$error3 = true;
	}	


	
	//Keine Fehler, wir können den Nutzer löschen
	if(!$error3) {	

		
		$result = $pdo->query("DELETE FROM users WHERE id = '$id_delete'");
		if($result) {		
			echo '<div class="text-center erfolgmsg">User Deleted</div>';
			$showFormular = false;
		} else {
			echo '<div class="col-md-12 text-center errormsg"><b>Beim Abspeichern ist leider ein Fehler aufgetreten.</b></div><br>';
		}
	} 
	} 
	
	
	
	
	