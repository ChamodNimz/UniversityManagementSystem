<?php 
	session_start();
	if(!isset($_SESSION['username']) && isset($_SESSION['password'] )){
		header('Location:index.php');
	}
	require_once('../dbConnection.php');
?>

<?php 

if(isset($_GET['c-code'])){
	
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
	<title>Proffessor Course update </title>
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
				 	<img src="images/c.jpg" width="200px" height="200px" class="rounded shadow-lg" style="border-radius: 100px !important;padding: 4px;background-color: lightblue;"><br><br>
				 	<hr>
				 	<h3 class="display-5 text-info">Course details</h3>
				 	<p class="float-left"><small>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				 	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				 	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				 	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				 	</small></p>
				 </div>
			</div>
			<div class="col-md-9">
				<form method="POST" action="#">
  						<table>
  							<thead>
  								<tr>
  				  					  <th scope="col" class="text-center pr-3">C-Code</th>
								      <th scope="col" class="text-center pr-3">Dept Code</th>
								      <th scope="col" class="text-center pr-3">C-Name</th>
								      <th scope="col" class="text-center pr-3">C-No</th>
								      <th scope="col" class="text-center pr-3">Crdt Hours</th>
								      <th scope="col" class="text-center pr-3">College</th>
								      <th scope="col" class="text-center pr-3">Update</th>
  								</tr>
  							</thead>
  							<tbody>

							  	<?php 
							  		require_once('../dbConnection.php');
							  		$query='select * from course';
							  		$dataSet=mysqli_query($connection,$query);
							  		while ($row=mysqli_fetch_array($dataSet)):
							  	?>
							    <tr class="text-center">
							      <th scope="row"><input type="text" size="1px" name="txtC" value="<?php echo''.$row[0].''; ?>" class="form-control" readonly></th>
							      <td><input type="text" name="d-code" size="1px" value="<?php echo''.$row[1].''; ?>" class="form-control"></td>
							      <td><input type="text" name="c-name" size="30px" value="<?php echo''.$row[2].''; ?>" class="form-control"></td>
							      <td><input type="text" name="c-no" size="1px" value="<?php echo''.$row[3].''; ?>" class="form-control"></td>
							      <td><input  type="text" name="crd-hrs" size="1px" value="<?php echo''.$row[4].''; ?>" class="form-control"></td>
							      <td><input type="text" name="college" value="<?php echo''.$row[5].''; ?>" class="form-control"></td>
							      <td><a class="btn btn-info float-right shadow m-2" href="prof-add-course.php?c-code=<?php echo"$row[0]"; ?>"><i class="far fa-edit"></i></a></td>
							    </tr>
							<?php  endwhile;?>
							</tbody>
  						</table>
				</form>
			</div>
		</div>
	</div>
</body>