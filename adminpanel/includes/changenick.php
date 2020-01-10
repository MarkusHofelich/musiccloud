<?php 

	//Benutzer Bearbeiten
	
	
	if($showchangenick) {
	$showFormular1 = true;
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=musicloud', 'root', '');

	if($showFormular1) {
	?>
	
	<div class="col-md-12 edit">
	<form action="?changenick=1" method="post">
		<h3 class="edit">BenutzerID ändern</h3>	
	
		<input type="text" id="oldid_change" placeholder="Old ID" name="oldid_change"></input>
		<input type="text" id="nick_change" placeholder="New Nick" name="nick_change"></input>
	
		<button type="submit" value="change" name="change">speichern</button>
	</div>
	</form>
	<?php
	}
	}
	?>
