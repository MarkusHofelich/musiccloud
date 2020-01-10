<?php

	if($showblocknick) {
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=musicloud', 'root', '');
	$showFormular2 = true;

	
	if($showFormular2) {
	?>
					  <div class="modal-body">
			<h3 class="edit">Benutzer blockieren</h3>	
		  	<form action="?blocknick=1" method="post">

			<input type="text" id="nick_block" placeholder="Nickname" name="nick_block"></input>
			<button type="submit" value="change" name="block">blockieren</button>
			</form>		
			<?php
	}
	}
	?>