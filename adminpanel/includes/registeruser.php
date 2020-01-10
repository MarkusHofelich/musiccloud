	<?php
	
	if($showregisteruser) {
	$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll


 
	if($showFormular) {
	?>	
	<div class="col-md-12 create">
		<h3 class="edit">Benutzer erstellen</h3>
	<form action="?register=1" method="post">
	
		<input type="text" id="vorname" placeholder="Name" name="vorname"></input>
		<input type="text" id="nickname" placeholder="Nickname" name="nickname"></input>
		<input type="email" id="email" placeholder="Email" name="email"></input>
		<input type="password" id="passwort" placeholder="Passwort" name="passwort"></input>
		<button type="submit" name="registrieren">Speichern</button>
	
	</form>
	</div>
	<?php
} 
	}	//Ende von if($showFormular)
	?>