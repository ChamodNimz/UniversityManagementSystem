<?php
	session_start();
	if(!isset($_SESSION['username']) && isset($_SESSION['password'] )){
		header('Location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Terminal</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php 
	include('student-navigation.php');
	?>

	<div class="back-image">
		<div class="container p-5">
			<div class="row">
				<!--receieve dialog-->
				<div class="col-md-6 bg-light">
					<div class="dialog">	
						<div class="title text-light">
							<div class="row">
								<div class="col-md-2">
									<img src="images/user-avatar.gif" width="30px" height="30px;" style="border-radius: 100px;">
								</div>
								<div class="col-md-8">
									chamod
								</div>
							</div>							
						</div>
					</div>
				</div>
				<!--send dialog-->
				<div class="col-md-6 bg-warning">
					
				</div>
			</div>
		</div>
	</div>

</body>
</html>