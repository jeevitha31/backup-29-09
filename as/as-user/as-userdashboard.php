<html>
	<head>
	
	</head>
	<body>
	<?php
		include dirname(dirname(__FILE__)) . "\as-config.php";
		$username = "venkaT";
		
		$user_package = "SELECT `available_package` FROM `as_user` WHERE `username` = '".$username."'";
		
		$result = $conn->query($user_package);
		
		while($row = $result->fetch_assoc()) {
			$available_package = explode (",",$row['available_package']);
			
		}
		foreach($available_package as $package){
	?>
			<form action = "" method = "post">
				<input type = "submit" name = "user_package" value = <?php echo $package; ?> >
			</form>
	<?php
		}
/*
		 foreach($available_package as $package){
			 $data_package = "SELECT * FROM `as_subpackage` WHERE `package` = '".$package."'";
			 $result_package = $conn->query($data_package);
				
				while($rows = $result_package->fetch_assoc()) {
					print_r($rows['subpackage']);
					
				}

		 }*/
	?>
	
	</body>
</html>
