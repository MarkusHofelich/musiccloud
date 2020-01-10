<?php 
	//Benutzer Bearbeiten
	
	
	if($showchangeemail) {
	$showFormular1 = true;
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=musicloud', 'root', '');

	if($showFormular1) {
	?>
	
	<div class="col-md-12 edit">
	<form action="?changeemail=1" method="post">
		<h3 class="edit">Benutzer ändern</h3>	
	
		<input type="text" id="id_change" placeholder="ID" name="id_change"></input>
		<input type="email" id="email_change" placeholder="New Email" name="email_change"></input>
	
		<button type="submit" value="change" name="change">speichern</button>
	</div>
	</form>
	<?php
	}
	}
	?>
