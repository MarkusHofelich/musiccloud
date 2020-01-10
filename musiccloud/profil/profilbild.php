<?php
if(!isset($_SESSION["userid"])) {
	session_start();
}
$ordner = 'profilbilder/';
$nick = $_SESSION['nick'];
$endung = ".png";
$profilbild = $ordner . $nick . $endung;

?>
<img src="<?php echo $profilbild; ?>" width="128px" height="128px" />