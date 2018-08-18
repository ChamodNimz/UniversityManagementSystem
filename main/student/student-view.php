<?php 
	session_start();
	$type=$_SESSION['type'];
	if(!isset($_SESSION['username']) && isset($_SESSION['password'] )){
		header('Location:index.php');
	}
	require_once('../dbConnection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student View</title>
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
	<?php include('student-navigation.php'); ?>
	<div class="container-fluid">
		<div class="row p-5">
			<div class="col-md-4">
				<div class="card shadow-lg wow bounceIn" data-wow-delay="0.4s" style="width: 18rem;">
				    <img class="card-img-top" src="images/books.jpg" alt="Card image cap">
				  		<div class="card-body">
						    <h5 class="card-title">Books</h5>
						    <p class="card-text">Click here to get started on books</p>
						    <a href="student-view-books.php" class="btn btn-primary">Let's go</a>
				  		</div>
				</div>
			</div>
			<div class="col-md-4">

				<div class="card shadow-lg wow bounceIn" data-wow-delay="0.6s" style="width: 18rem;">
				    <img class="card-img-top" src="images/course-section.jpg" alt="Card image cap" style="height: 180px;">
				  		<div class="card-body">
						    <h5 class="card-title">Course Section</h5>
						    <p class="card-text">Click here to go to course section</p>
						    <a href="student-view-course-section.php" class="btn btn-primary">Let's go</a>
				  		</div>
				</div>

			</div>
			<div class="col-md-4">

				<div class="card shadow-lg wow bounceIn" data-wow-delay="0.8s"style="width: 18rem;">
				    <img class="card-img-top" src="images/courses.jpeg"  alt="Card image cap">
				  		<div class="card-body">
						    <h5 class="card-title">Course</h5>
						    <p class="card-text">Click here to get started on course</p>
						    <a href="course-view.php" class="btn btn-primary">Let's go</a>
				  		</div>
				</div>
<br><br>
			</div>
			
			<div class="col-md-4">
				<div class="card shadow-lg <?php if($type!='Graduate'){echo"wow bounceIn";} ?>" data-wow-delay="1.0s" style="width: 18rem;" <?php if($type=='Graduate'){echo"hidden";} ?> >
				    <img class="card-img-top" src="images/company.jpeg"  alt="Card image cap">
				  		<div class="card-body">
						    <h5 class="card-title">Company Session</h5>
						    <p class="card-text">Click here to get started on company session </p>
						    <a href="student-view-compSession.php" class="btn btn-primary">Let's go</a>
				  		</div>
				</div>

			</div>
			<div class="col-md-4">
				<div class="card shadow-lg <?php if($type!='Undergraduate'){echo"wow bounceIn";} ?>" data-wow-delay="1.2s" style="width: 18rem;" <?php if($type=='Undergraduate'){echo"hidden";} ?> >
				    <img class="card-img-top" src="images/lab.jpg"  alt="Card image cap" style="height: 200px;">
				  		<div class="card-body">
						    <h5 class="card-title">Lab Sessions</h5>
						    <p class="card-text">Click here to get started on Lab session </p>
						    <a href="student-view-lab.php" class="btn btn-primary">Let's go</a>
				  		</div>
				</div>

			</div>
		</div>
	</div>
</body>
</html>