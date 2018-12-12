<?php
		include "../../db_connect.php";

			$sql = "SELECT * FROM workers w INNER JOIN users u WHERE w.worker_id = $worker_id && w.user_id = u.user_id";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			
			$firstname = $row['first_name'];
			$middlename = $row['middle_name'];
			$lastname = $row['last_name'];
			$position = $row['position'];
			$contactno = $row['contact_no'];
			$user_id = $row['user_id'];
?>