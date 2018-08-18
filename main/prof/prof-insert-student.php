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
		

			$stdname=$_POST['txtName'];
			$stdaddress=$_POST['txtAddress'];
			$stdpassword=$_POST['txtPassword'];
			$type=$_POST['drpType'];
			$query="insert into student (name,address,type,password) values('$stdname','$stdaddress','$type','$stdpassword')";
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
	<title>Student update details</title>
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
				 	<img src="images/user-avatar" width="200px" height="200px" class="rounded shadow-lg" style="border-radius: 100px !important;padding: 4px;background-color: lightblue;"><br><br>
				 	<hr>
				 	<h3 class="display-4 text-info">Bio</h3>
				 	<p class="float-left">
				 	</p>
				 </div>
			</div>
			<div class="col-md-6">
				<form method="POST" action="#">
  						<div class="form-group">
  							<h3 class="display-4 text-info" style="text-align: right;">Insert Student Details</h3><hr style="background-color: black;">
    						<label for="txtname" class="text-info lead">Name <span class="text-danger">*</span></label>
    					<input type="text" class="form-control shadow unround" id="txtName" name="txtName" placeholder="Name" >
  						</div>
  						<div class="form-group">
  							
    						<label for="txtAddress" class="text-info lead">Address <span class="text-danger">*</span></label>
							<textarea  class="form-control shadow unround" id="txtAddress" name="txtAddress" >
							</textarea>
  						</div>
  						<select class="form-control" id="drpType" name="drpType">
					      <option>Graduate</option>
					      <option>Other</option>
					    </select>
  						<div class="form-group">
    						<label for="txtpassword" class="text-info lead">Password <span class="text-danger">*</span></label>
    							<input type="text" name="txtPassword" class="form-control shadow unround" id="txtPassword" placeholder="Password" >
  						</div>
  						<br>
  						<button class="btn btn-info float-right shadow" type="submit">Edit Changes <i class="far fa-edit"></i></button>
				</form>
			</div>
			<div class="col-md-3">
				<img src="images/side-bar.jpg" width="355px" >
			</div>
		</div>
	</div>
</body>
</html>