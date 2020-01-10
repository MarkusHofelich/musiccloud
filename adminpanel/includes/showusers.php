<?php if($showusers) { ?>
	<div class="users">
		<h2 class="text-center">Benutzerliste</h2>
		<div class="col-md-12 text-center">
		</div>
		<table class="table">
		<thead>
			<tr>
			  <th>ID</th>
			  <th>Name</th>
			  <th>Nickname</th>
			  <th>Email</th>
			  <th>IP Adresse</th>
			</tr>
		</thead>
	</div>
	<?php 	
	include('db.php');

	// Create connection
	// Check connection
	echo '<br>';
	$sql = "SELECT id, vorname, nickname, email, passwort, ip FROM users";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<tbody><tr><td>" . $row["id"]."</td><td>" . $row["vorname"]. "</td><td> " . $row["nickname"]. "</td><td> " . $row["email"]. "</td><td>" . $row["ip"]. "</td></tr></tbody><br>";
		}
	} else {
		echo "0 results";
	}
	$conn->close();
	?>
	</table>
	</div>
<?php
	}
	?>