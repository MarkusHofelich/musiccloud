<?php
if(!isset($_SESSION["userid"])) {
	session_start();
}
include('db.php');
if($_SESSION["userid"]) {
$touser = $_SESSION['nick'];

$sql = mysqli_query($conn, "SELECT * FROM `pms` WHERE `touser` = '$touser' AND `deleted` = '0' ORDER BY `datesent` DESC");

?>

<table width='95%'>
	
    <tr><th> </th><th>From</th><th>Subject</th><th>Date</th></tr>

<?php

while($r = mysqli_fetch_object($sql)) {

	$r->subject = stripslashes($r->subject);
	$r->datesent = gmdate('d/m/y g:ia');

	if($r->read = "0") {
	   $read = "red.png";
	}
	else { 
	   $read = "green.png";
	}

	echo "<tr><td><img src='".$read."' /></td><td>$r->fromuser</td><td><a href='view.php?id=$r->id'>$r->subject</a></td><td>$r->datesent</td></tr>"; 


}
}
?>

</table>