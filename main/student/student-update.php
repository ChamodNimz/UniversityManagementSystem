<?php 
	session_start();
	if(!isset($_SESSION['username']) && isset($_SESSION['password'] )){
		header('Location:index.php');
	}
	require_once('../dbConnection.php');
?>

<?php 

if(isset($_POST['txtName']) && isset($_POST['txtAddress']) &&isset($_POST['txtPassword'])){
	
		require_once('../dbConnection.php');
		if($_SESSION['type']!='Graduate'){

			$name=$_POST['txtName'];
			$address=$_POST['txtAddress'];
			$password=$_POST['txtPassword'];
			$query="update student set name='$name', address='$address', password='$password' where name='".$_SESSION['username']."'";
			$result=mysqli_query($connection,$query);
			if($result>0){
				
				include('../../alerts/successMessage.php');
			}
			else{
				
				include('../../alerts/error-db-message.php');
			}
		}
		else{

			$name=$_POST['txtName'];
			$address=$_POST['txtAddress'];
			$password=$_POST['txtPassword'];
			$query="update graduate_student set name='$name', address='$address', password='$password' where name='".$_SESSION['username']."'";
			$result=mysqli_query($connection,$query);
			if($result>0){
				
				include('../../alerts/successMessage.php');
			}
			else{
				
				include('../../alerts/error-db-message.php');
			}
		}
		
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student update details</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include('student-navigation.php'); ?>
	<div class="container-fluid">
		<div class="row p-5 mt-5">
			<div class="col-md-3">
				 <div class="container border text-center profile-card">
				 	<button class="upload btn btn-dark" ><i class="fas fa-camera"></i></button>
				 	<img src="images/user-avatar" width="200px" height="200px" class="rounded shadow-lg" style="border-radius: 100px !important;padding: 4px;background-color: lightblue;"><br><br>
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

  							if($_SESSION['type']!='Graduate'){

  								$user=$_SESSION['username'];
  								$query="select address from student where name='$user' ";
  								$data=mysqli_query($connection,$query);
  								$row=mysqli_fetch_array($data);
  							}
  							else{

  								$user=$_SESSION['username'];
  								$query="select address from graduate_student where name='$user'";
  								$data=mysqli_query($connection,$query);
  								$row=mysqli_fetch_array($data);
  							}
  								
  							?>
    						<label for="txtAddress" class="text-info lead">Address <span class="text-danger">*</span></label>
							<textarea  class="form-control shadow unround" id="txtAddress" name="txtAddress" rows="4" required><?php echo"$row[0]"; ?>
							</textarea>
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
				<img src="images/tree-pattern.png" width="355px" >
			</div>
		</div>
	</div>
</body>
</html>