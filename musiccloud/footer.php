	<div class="col-xs-12 text-center footer">
		<a href="/musiccloud/index.php">Home</a> |
		<?php
		if($_SESSION['userid'] <= 2){echo '<a style="color:red" href="/adminpanel/index.php">Adminpanel</a> |';}  else echo '';
		?>
		<a href="/formulare/hilfe.php">Hilfe</a> 
		<div class="hidden-xs hidden-sm">
			Designed by Markus and Function by Z0mGr0HD
			<br>&copy 2016 All rights reserved
		</div>
	</div>