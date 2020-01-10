<?php
if(!isset($_SESSION["userid"])) {
	session_start();
}
include('db.php');
function cleanPost($str) {

    $str = addslashes($str);
    $str = htmlspecialchars($str);

}
$touser = $_POST['touser'];
$subject = $_POST['subject'];
$msg = $_POST['message'];

// preprocessed vars
$fromuser = $_SESSION['nick'];
$time = time();

// check to see if the form is valid 
# form security would go here

// insert query
$sql = "INSERT INTO `pms` (`id`,`touser`,`fromuser`,`subject`,`message`,`read`,`deleted`,`datesent`) VALUES (NULL, '$touser', '$fromuser', '$subject', '$msg', '0', '0','$time')";
$result = mysqli_query($conn, $sql)   or trigger_error('Fehler in Query "' . $sql . '". Fehlermeldung: ' . mysqli_error($conn), E_USER_ERROR);
				if($result) {		
			echo '<div class="text-center erfolgmsg">Erfolgreich versendet</div>';
		} else {
			echo '<div class="col-md-12 text-center errormsg"><b>Beim Versenden ist leider ein Fehler aufgetreten.</b></div><br>';
		}


// redirect away from post page.
header('location: index.php');
?>