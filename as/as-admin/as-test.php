<html>
	<head>
	</head>
	<body>
		<h1><?php  session_start(); 
			if(isset($_POST["set_packagetest"])){
				$_SESSION["package_name"] =  $_POST["set_packagetest"];	
			}  
			echo $_SESSION["package_name"]."  Package";  ?></h1>
			
		<form action="as-package.php" method= "post" >
			<input type = "text" name = "test_name" >
			<input type = "hidden" name = "test_package_name" value = <?php echo $_SESSION["package_name"];  ?>>
			<input type  = "submit" name = "create_test" value = "Create Test">
		</form>
		<table>
			<?php
				include dirname(dirname(__FILE__)) . "\as-config.php";
				
				$sql = "SELECT * FROM `as_subpackage` WHERE `package` = '".$_SESSION["package_name"]."'";
				$result = $conn->query($sql);
					while($row = $result->fetch_assoc()) {
			?>
						<tr>
							<td>
								<form action='as-setquestion.php' method= 'post'>				
									<input type = 'submit' name = 'settest_qusetions' value = <?php echo $row["subpackage"] ; ?>>
								</form>
							</td>
							<td>
								<form action='as-package.php' method= 'post'>
									<input type = 'hidden' name = 'delete_test_name' value = <?php echo  $row["subpackage"] ;?>>
									<input type = 'submit' name = 'Delete_test' value = 'Delete'>
								</form>
							</td>			
						</tr>
			<?php   }
				
			?>
		</table>
	</body>
</html>

