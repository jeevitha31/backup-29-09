<?php	
	include dirname(dirname(__FILE__)) . "\as-config.php";
	
	// This codition is used to create package
	if(isset($_POST["packagename"])){
			$packagename = strtoupper($_POST["packagename"]);
			$sql = "INSERT INTO `as_package` (`package_name`)
					VALUES ('".$packagename."')";
					
					if ($conn->query($sql) === FALSE) {
						    echo "<br>Error: " . $sql . "<br>" . $conn->error;
					}header('Location: index.php');
	}

	// This codition is used to delete package	
	if(isset($_POST["delete_pack"])){
			$delete_package = "DELETE FROM `as_package` WHERE `package_name` ='".$_POST["delete_pack"]."'";
			$delete_test_package = "DELETE FROM `as_subpackage` WHERE `package` ='".$_POST["delete_pack"]."'";
			
			if ($conn->query($delete_test_package) === FALSE) {
				echo "Error deleting test package record: " . $conn->error;
			}
			if ($conn->query($delete_package) === FALSE) {
				echo "Error deleting package record: " . $conn->error;
			}header('Location: index.php');
			
	}
	
	//This  condition is used to create test
	if(isset($_POST["create_test"])){
			$test_name = $_POST["test_name"];
			$create_test = "INSERT INTO `as_subpackage` (`subpackage` , `package`)
					VALUES ('".$_POST["test_package_name"]."-".$_POST["test_name"]."' ,'".$_POST["test_package_name"]."' )";
					
					if ($conn->query($create_test) === FALSE) {
						    echo "<br>Error: " . $sql . "<br>" . $conn->error;
					}header('Location: as-test.php');
	}

	// This codition is used to delete test	
	if(isset($_POST["Delete_test"])){
			$delete_test = "DELETE FROM `as_subpackage` WHERE `subpackage` ='".$_POST["delete_test_name"]."'";
	
			if ($conn->query($delete_test) === FALSE) {
				echo "Error deleting record: " . $conn->error;
			}header('Location: as-test.php');
			
	}
	
	//This Condition is use to add test question
	if(isset($_POST['add_question'])){
		foreach($_POST['test'] as $test){
			$add_question = "UPDATE `as_question` SET `subpackage` = '".$_POST["tese_name"]."' WHERE `id` = '".$test."'";
			
			if (mysqli_query($conn, $add_question)) {
				header('Location: as-setquestion.php');
			} else {
				echo "Error updating record: " . mysqli_error($conn);exit;
			}		
		}		
	}
?>

