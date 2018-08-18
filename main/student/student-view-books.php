<?php 
	session_start();
	if(!isset($_SESSION['username']) && isset($_SESSION['password'] )){
		header('Location:index.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Student View Books</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include('student-navigation.php'); ?>
	<div class="container p-5">
		<table class="table table-striped" id="table_id">
			  <thead>
			    <tr>
			      <th scope="col">ISBN</th>
			      <th scope="col">Publisher</th>
			      <th scope="col">Auther</th>
			      <th scope="col">Year</th>
			      <th scope="col">Title</th>
			      <th scope="col">Name</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  		require_once('../dbConnection.php');
			  		$query='select * from book';
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
	<script type="text/javascript">
		//code for table creating functional
		$(document).ready( function () {
    		$('#table_id').DataTable();
		} );
	</script>
</body>
</html>