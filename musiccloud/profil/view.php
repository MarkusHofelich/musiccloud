<?php

if(!isset($_SESSION["userid"])) {
	session_start();
}
include('db.php');
if($_SESSION['userid']) {
	$touser = $_SESSION['nick'];
$id = $_GET['id'];

if(!isset($id)) {
   header('location: inbox.php');
}
elseif(isset($id)) {

$grab_pm = mysqli_query($conn, "SELECT * FROM `pms` WHERE `touser` = '$touser' AND `id` = '$id'");

while($r= mysqli_fetch_object($grab_pm)) {
	$r->datesent = gmdate('d/m/y g:ia');
   if($r->read == "0") { $update = mysqli_query($conn, "UPDATE `pms` SET `read` = '1' WHERE `id` = '$r->id' LIMIT 1"); }
   ?> <div class="Mailread"><?php
   echo "<h2>$r->subject</h2>";
   echo "<p>$r->message</p>";
   echo "<p>From: $r->fromuser On: $r->datesent</p>";?>
</div>
<?php
 
}

}
}
?>