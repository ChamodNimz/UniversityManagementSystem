<?php 
	session_start();
	if(!isset($_SESSION['username']) && isset($_SESSION['password'] )){
		header('Location:index.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Course view</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include('student-navigation.php'); ?>
	<div class="container p-5">
		<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">Course Code</th>
			      <th scope="col">Dept Code</th>
			      <th scope="col">Course Name</th>
			      <th scope="col">Course No</th>
			      <th scope="col">Credit Hours</th>
			      <th scope="col">College</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  		require_once('../dbConnection.php');
			  		$query='select * from course';
			  		$dataSet=mysqli_query($connection,$query);
			  		while ($row=mysqli_fetch_array($dataSet)):
			  	?>
			    <tr>
			      <th scope="row"><?php echo"".$row[0].""; ?></th>
			      <td><?php echo"".$row[1].""; ?></td>
			      <td><?php echo"".$row[2].""; ?></td>
			      <td><?php echo"".$row[3].""; ?></td>
			      <td><?php echo"".$row[4].""; ?></td>
			      <td><?php echo"".$row[5].""; ?></td>
			    </tr>
			<?php  endwhile;?>
			  </tbody>
		</table>
	</div>
</body>
</html>