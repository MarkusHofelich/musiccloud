<?php
if($_SESSION['userid']) {
	include('db.php');
	$id = @$_GET['id'];
	$fromuser = $_SESSION['nick'];
	
	if(!isset($id)) {
	   header('location: inbox.php');
	}
	elseif(isset($id)) {

		$grab_pm = mysqli_query($conn, "SELECT * FROM `pms` WHERE `fromuser` = '$fromuser' AND `id` = '$id'");

		while($r= mysql_fetch_object($grab_pm)) {
		
			$r->subject = stripslashes($r->subject);
			$r->message = stripslashes($r->message);
			$r->message = nl2br($r->message);
			
		   
		   
		   echo "<h2>$r->subject</h2>";
		   echo "<p>$r->message</p>";
		   echo "<p>From: $r->fromuser On: $r->datesent</p>";
		
		 
		}

	}
	
}
?>