<?php if($showblocks) { ?>
		<br><br>>>>>	
		<div class="col-md-12 text-center">
					<table class="table">
		<thead>
			<tr>
			  <th> ID </th>
			  <th>Nickname</th>
			 <th>Email-Adresse</th>
			  <th>Blockiert</th> <?php // 1 Heisst Ja 0 Heisst Nein ?>
			</tr>
		</thead>
	
	<?php 	
	
	include('db.php');

	// Create connection
	// Check connection
	echo '<br>';
	$sql = "SELECT id, email, nickname, block FROM users WHERE block = '1'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<tbody><tr><td>" . $row["id"]."</td><td>" . $row["nickname"]. "</td><td> " . $row["email"]. "</td><td>" . $row["block"]. "</td><td></tbody><br>";

		}
	} else {
		echo "0 results";
	}
	$conn->close();
	
	?>

	</TABLE>
			<br><<<<<<

	  <?php
	}

		  ?>