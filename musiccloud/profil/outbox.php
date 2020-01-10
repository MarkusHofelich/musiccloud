<?php
include('db.php');
if(!isset($_SESSION["userid"])) {
	session_start();
}
if($_SESSION['userid']) {

	$fromuser = $_SESSION['nick'];

	$sql = mysqli_query($conn, "SELECT * FROM pms WHERE fromuser = '$fromuser' ORDER BY datesent DESC");
    ##$result = mysqli_query($conn, $sql)   or trigger_error('Fehler in Query "' . $sql . '". Fehlermeldung: ' . mysqli_error($conn), E_USER_ERROR);
?>
<div class="outbox">
<table width='20%'>
	
    <tr><th>From</th><th>Subject</th><th>Date</th></tr>

<?php

while($r = mysqli_fetch_object($sql)) {

	$r->subject = stripslashes($r->subject);
	$r->datesent = gmdate('d/m/y g:ia');
	echo "<tr><td>$r->touser</td><td><a href='view.php?id=$r->id'>$r->subject</a></td><td>$r->datesent</td></tr>"; 


}

?>

</table>
</div>
<?php
// end if
}