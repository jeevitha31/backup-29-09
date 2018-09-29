<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../as-bootstrap/css/bootstrap.min.css">
		<script src="../as-bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
		<style>
			#set_packagetest{
				height:100px;
				width:150px;
				background-color:#943bea;
				color:white;
				border:#9E8FEF;
  

			}
			#deletebtn{
				margin:7px;
				background-color:red;
				color:white;
			}
		</style>
	<body>
	
		<div class="container">
		<h3><strong>CREATE PACKAGE:</strong></h3>
			<div class="row">
				<form action="as-package.php" method= "post" >
					<div class="col-md-6">
						<input type = "text" name = "packagename" class="form-control">
					</div>
					<div class="col-md-6">
						<input type = "submit" class="col-md-8 btn btn-success" value = "Create Package">
					</div>
				</form>
			</div>
			<br/>
			<div class="row">
				
				<?php
					include dirname(dirname(__FILE__)) . "\as-config.php";
					
					$sql = "SELECT * FROM as_package";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
				?>		
						<div class="col-md-3">
							<form action='as-test.php' method= 'post'>				
								<input type = 'submit' id="set_packagetest" name = 'set_packagetest' value = <?php echo $row["package_name"];?>>
							</form>
							
							<form action='as-package.php' id="deleteform" name="form1" method= 'post'>
								<input type = 'hidden'  name = 'delete_pack' value = <?php echo $row["package_name"];?>>
								<input type = 'submit' id="deletebtn" name = 'Delete' value = 'DELETE PACKAGE' >
							</form>
							<br/>
							
						</div>
				<?php
						}
					}
				
				?>

			
			<div>
			
			
		</div>
		
	</body>
</html>