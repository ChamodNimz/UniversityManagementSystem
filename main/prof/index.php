	<?php 

	require_once('../dbConnection.php');

	if(isset($_POST['txtUserNameEmail']))
	{
		$username=$_POST['txtUserNameEmail'];
		$password=$_POST['txtPassword'];
		$query="select profName,password from professor where profName ='$username' and password= '$password' ";
		$dataSet=mysqli_query($connection,$query);
		$row=mysqli_fetch_array($dataSet);
		if($row['profName']==$username && $row['password'] ==$password)
		{	
			//cookie setting cookie_name,value,expire,path

			
			session_start();
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;

			header('Location:landing-page.php');
		}
		else
		{
			include('../../alerts/errorMessage.php');
		}
	}

?>
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
			<div class="row ">
				<div class="col-md-4"></div>
				<div class="col-md-4 shadow-lg p-5 rounded mt-5 mt-5 ">
					<!--title of the logging form-->
					<a class="btn btn-dark back" role="button" href="../home.php">
					<i class="fas fa-chevron-left"></i>
				</a>
				<div class="col-md-12">
					<h2 class="display-3 text-info">Login</h2>
				</div>
				<hr class="my-4">
				<img src="../../images/men.png" width="100px" height="100px" class="p-1 m-4">
				<div class="col">
					<input type="text" name="txtUserNameEmail" placeholder="Username / Email" id="txtUserNameEmail" class="form-control shadow mt-2 mb-4" required>
				</div>
				<div class="col">
				</div>
				<div class="col">
					<input type="password" placeholder="Password" name="txtPassword" id="txtPassword" class="form-control shadow "  required>
				</div>
					<a  role="button"  class="btn btn-outline-info  mt-5 ml-2 shadow text-dark" >Sign Up</a>
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
		<div class="row ">
			<div class="col-md-4 bg-dark " >
				ererwerw
			</div>
			<div class="col-md-4 bg-dark" >
			werwerwerwe
			</div>
			<div class="col-md-4 bg-dark" >
			werwere
			</div>
		</div>
	</div>
	<!-- footer finish-->
</body>
</html>
