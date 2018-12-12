		<!-- Get client ID -->
		<?php 
		
		include '../../db_connect.php';
		
		$client_id = $_GET['client_id']; 
		
		$sql = "SELECT * FROM client WHERE client_id = '$client_id'";
		$result = $con->query($sql);
		$row = $result->fetch_assoc(); 
		
		if ($row['sex'] == 'Male') {
			header("Location: choose-pre-marriage-male.php?client_id=$client_id");
		} else {
			header("Location: choose-pre-marriage-female.php?client_id=$client_id");
		}
		
		
		?>