<html>
	<head>
	</head>
	<body>
		<h1><?php session_start();
		if(isset($_POST["settest_qusetions"])){
			$_SESSION['test_name'] = $_POST["settest_qusetions"];
		}
		echo "Add  Question For The Test ".$_SESSION['test_name']; ?></h1>
		<form action = "as-package.php" method = "post">
			<?php
			
				include dirname(dirname(__FILE__)) . "\as-config.php";
				
				
				$language = explode("-",$_SESSION['test_name']);	
				$package_test_question = "SELECT * FROM `as_question` WHERE `language` = '".$language[0]."' && `subpackage` = ''";
				$result = $conn->query($package_test_question);
					
					while($row = $result->fetch_assoc()) {
			?>
						<input type = "checkbox" name = "test[]" value = <?php echo $row["id"] ;?>>
			<?php 			echo $row['question']."<br>";
					}
			?>
			<input type = "hidden" name ="tese_name" value = <?php echo $_SESSION['test_name']; ?>>
			<input type = "submit" name = "add_question" value = "Add Qusetions" >
		</form>
	</body>
</html>
