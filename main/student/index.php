	<?php 

	require_once('../dbConnection.php');

	if(isset($_POST['txtUserNameEmail']))
	{
		if($_POST['drpType']=='Graduate'){

			$username=$_POST['txtUserNameEmail'];
			$password=$_POST['txtPassword'];
			$query="select name,password from graduate_student where name ='$username' and password= '$password' ";
			$dataSet=mysqli_query($connection,$query);
			$row=mysqli_fetch_array($dataSet);
			if($row['name']==$username && $row['password'] ==$password)
			{	
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['password']=$password;
				$_SESSION['type']='Graduate';
				header('Location:landing-student.php');
			}
			else
			{
				include('../../alerts/errorMessage.php');
			}
		}
		else{

			$username=$_POST['txtUserNameEmail'];
			$password=$_POST['txtPassword'];
			$query="select name,password,type from student where name ='$username' and password= '$password' ";
			$dataSet=mysqli_query($connection,$query);
			$row=mysqli_fetch_array($dataSet);
			if($row['name']==$username && $row['password'] ==$password)
			{	
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['password']=$password;
				$_SESSION['type']=$row['type'];
				header('Location:landing-student.php');
			}
			else
			{
				include('../../alerts/errorMessage.php');
			}
		}
		
	}

?>

<!-- student form login-->
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<!--body login form starting-->
	
	<div class=" text-center"><br>
		<form method="post" action="#">
			<div class="form-group">
				<div class="container-fluid">
					
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4 shadow-lg p-5 rounded mt-5 mt-5 ">
					<!--title of the logging form--><a class="btn btn-dark back" role="button" href="../home.php">
					<i class="fas fa-chevron-left"></i>
					</a>
				<div class="col-md-12">
					<h2 class="display-3 text-info">Login</h2>
				</div>
				<hr class="my-4">
				<img src="images/student.ico" width="100px" height="100px" class="p-1 m-4">
				<div class="col">
					<input type="text" name="txtUserNameEmail" placeholder="Username" id="txtUserNameEmail" class="form-control shadow mt-2 mb-4" required>
				</div>
				<div class="col">
				</div>
				<div class="col">
					<input type="password" placeholder="Password" name="txtPassword" id="txtPassword" class="form-control shadow "  required>
				</div>
				<div class="col"><br>
					<label for="exampleFormControlSelect1">Type</label>
					    <select class="form-control" id="drpType" name="drpType">
					      <option>Graduate</option>
					      <option>Other</option>
					    </select>
				</div>	    
					<input type="submit" name="btnSubmit" class="btn btn-info mt-5 mr-2  shadow " value="login">
				</div>
				<div class="col-md-4"></div>	
			</div>				
				</div>
			</div>
		</form><br><br>
	</div>	

	<!-- loging form finish-->

	<!-- footer start-->
	<div class="container-fluid">
		
	</div>
	<!-- footer finish-->
</body>
</html>
