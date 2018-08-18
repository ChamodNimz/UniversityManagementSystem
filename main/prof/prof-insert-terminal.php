<?php 
	session_start();
	if(!isset($_SESSION['username']) && isset($_SESSION['password'] )){
		header('Location:index.php');
	}
	require_once('../dbConnection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Professor Insert Terminal</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<link rel="stylesheet" type="text/css" href="../../css/animate.min.css">
	<script type="text/javascript" src="../../js/wow.min.js"></script>
	<script>
              new WOW().init();
    </script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include('navigation.php'); ?>
	<div class="container-fluid">
		<div class="row p-5">
			<div class="col-md-4">
				<div class="card shadow-lg wow bounceIn" data-wow-delay="0.4s" style="width: 18rem;">
				    <img class="card-img-top" src="images/account.jpg" alt="Card image cap" style="height: 180px;">
				  		<div class="card-body">
						    <h5 class="card-title">Student</h5>
						    <p class="card-text">Click here to Add a student</p>
						    <a href="prof-add-student.php" class="btn btn-primary">Let's go</a>
				  		</div>
				</div>
			</div>
			<div class="col-md-4">

				<div class="card shadow-lg wow bounceIn" data-wow-delay="0.6s" style="width: 18rem;">
				    <img class="card-img-top" src="images/courses.jpeg" alt="Card image cap" style="height: 180px;">
				  		<div class="card-body">
						    <h5 class="card-title">Courses</h5>
						    <p class="card-text">Click here to add Courses</p>
						    <a href="prof-add-course.php" class="btn btn-primary">Let's go</a>
				  		</div>
				</div>

			</div>
			<div class="col-md-4">

				<div class="card shadow-lg wow bounceIn" data-wow-delay="0.8s"style="width: 18rem;">
				    <img class="card-img-top" src="images/books.jpg"  alt="Card image cap" style="height: 180px;">
				  		<div class="card-body">
						    <h5 class="card-title">Books</h5>
						    <p class="card-text">Click here Add books</p>
						    <a href="prof-insert-books.php" class="btn btn-primary">Let's go</a>
				  		</div>
				</div>
<br><br>
			</div>
			
			<div class="col-md-4">

				<div class="card shadow-lg wow bounceIn" data-wow-delay="0.6s" style="width: 18rem;">
				    <img class="card-img-top" src="images/courses.jpeg" alt="Card image cap" style="height: 180px;">
				  		<div class="card-body">
						    <h5 class="card-title">Course Session</h5>
						    <p class="card-text">Click here to add Course Session</p>
						    <a href="prof-insert-course-section.php" class="btn btn-primary">Let's go</a>
				  		</div>
				</div>

			</div>

			</div>
		</div>
	</div>
</body>
</html>