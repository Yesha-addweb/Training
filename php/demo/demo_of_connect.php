<!DOCTYPE html>
<html>
	<body>
		<?php
			$servername = "mysql";
			$username = "root";
			$password = "root";
			$dbname = "myDB";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "UPDATE MyGuests SET lastname='shah' WHERE id=4";

			if ($conn->query($sql) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
		?>
		
	</body>
</html>