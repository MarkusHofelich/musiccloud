<?php
	if($showblockid) {
	$showFormular2 = true;
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=musicloud', 'root', '');

	
	if($showFormular2) {
	?>
			<h4 class="modal-title" id="ip">Benutzer blockieren</h4>
		  	<form action="?blockid=1" method="post">
		  <div class="modal-body">
			<h3 class="edit">Benutzer blockieren</h3>	
			<input type="text" id="id_block" placeholder="ID" name="id_block"></input>
			<button type="submit" value="change" name="block">blockieren</button>
			</form>		
			</div>
			<?php
	}
	}
	?>