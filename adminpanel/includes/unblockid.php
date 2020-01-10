
	<?php
	if($showunblock) {
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=musicloud', 'root', '');

	
	?>

    <div class="modal-body">
			<h3 class="edit">Benutzer entblockieren</h3>	
<form action="?unblock=1" method="post">
			<input type="text" id="id_unblock" placeholder="ID" name="id_unblock"></input>
			<button type="submit" value="change" name="unblock">entblockieren</button>
			</form>		
			</div>
			<?php
			
	} ?>