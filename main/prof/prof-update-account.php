<?php 
	session_start();
	if(!isset($_SESSION['username']) && isset($_SESSION['password'] )){
		header('Location:index.php');
	}
	require_once('../dbConnection.php');
?>

<?php 

if(isset($_POST['txtName']) &&isset($_POST['txtPassword'])){
	
			$name=$_POST['txtName'];
			$password=$_POST['txtPassword'];
			$phone=$_POST['txtPhone'];
			$office=$_POST['txtOffice'];
			$query="update professor set profName='$name', office='$office', phone='$phone', password='$password' where profName='".$_SESSION['username']."'";
			$result=mysqli_query($connection,$query);
			if($result>0){
				
				include('../../alerts/successMessage.php');
			}
			else{
				
				include('../../alerts/error-db-message.php');
			}


}
		
?>
<!DOCTYPE html>
<html>
<head>
	<title>Proffessor update details</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include('navigation.php'); ?>
	<div class="container-fluid">
		<div class="row p-5 mt-5">
			<div class="col-md-3">
				 <div class="container border text-center profile-card">
				 	<button class="upload btn btn-dark" ><i class="fas fa-camera"></i></button>
				 	<img src="images/avatar.png" width="200px" height="200px" class="rounded shadow-lg" style="border-radius: 100px !important;padding: 4px;background-color: lightblue;"><br><br>
				 	<hr>
				 	<h3 class="display-4 text-info">Bio</h3>
				 	<p class="float-left"><small>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				 	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				 	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				 	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				 	</small></p>
				 </div>
			</div>
			<div class="col-md-6">
				<form method="POST" action="#">
  						<div class="form-group">
  							<h3 class="display-4 text-info" style="text-align: right;">Edit Details</h3><hr style="background-color: black;">
    						<label for="name" class="text-info lead">Name <span class="text-danger">*</span></label>
    <input type="text" class="form-control shadow unround" id="txtName" name="txtName" placeholder="Name" value='<?php echo"".$_SESSION['username']."" ?>' required>
  						</div>
  						<div class="form-group">
  							<?php

  								$user=$_SESSION['username'];
  								$query="select * from  professor where profName='$user'";
  								$data=mysqli_query($connection,$query);
  								$row=mysqli_fetch_array($data);
  								
  							?>

						<div class="form-group">
    						<label for="office" class="text-info lead">Office <span class="text-danger">*</span></label>
    							<input type="text" name="txtOffice" class="form-control shadow unround" id="txtOffice" placeholder="Office" value='<?php echo"".$row["office"].""; ?>' required>
  						</div>

  						<div class="form-group">
    						<label for="phone" class="text-info lead">Phone <span class="text-danger">*</span></label>
    							<input type="text" name="txtPhone" class="form-control shadow unround" id="txtPassword" placeholder="Phone" value='<?php echo"".$row["phone"].""; ?>' required>
  						</div>

  						</div>
  						<div class="form-group">
    						<label for="name" class="text-info lead">Password <span class="text-danger">*</span></label>
    							<input type="text" name="txtPassword" class="form-control shadow unround" id="txtPassword" placeholder="Password" value='<?php echo"".$_SESSION['password']."" ?>' required>
  						</div>

  						<br>
  						<button class="btn btn-info float-right shadow" type="submit">Edit Changes <i class="far fa-edit"></i></button>
				</form>
			</div>
			<div class="col-md-3">
				<img src="images/side-bar.png" width="355px" >
			</div>
		</div>
	</div>
</body>
</html>