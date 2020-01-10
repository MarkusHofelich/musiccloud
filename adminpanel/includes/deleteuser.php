<?php 
	//Benutzer Löschen
	if($showdelete) {
	$showFormular3 = true;
	if($showFormular3) {
	?>
	
	<div class="col-md-12 delete">
		<h3 class="delete">Benutzer löschen</h3>	
		<form action="?delete=1" method="post">
		<input type="text" id="id_delete" placeholder="ID" name="id_delete"></input>
		<button type="submit" value="delete" name="delete">Delete</button>
		</form>
	</div>
	<?php
	}
	}
	?>