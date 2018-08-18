<?php 
	session_start();
	if(!isset($_SESSION['username']) && isset($_SESSION['password'] )){
		header('Location:index.php');
	}
	require_once('../dbConnection.php');
?>

<?php 

	if(isset($_GET['c-code'])){

		echo"oki doki ";
		

		if($_POST){
			
			var_dump($_POST);
		}

}

if(isset($_POST['txtCourseName']) &&isset($_POST['txtCourseNo']) && isset($_POST['add'])){
	
			$c_name=$_POST['txtCourseName'];
			$dept_code=$_POST['drpDeptCode'];
			$c_No=$_POST['txtCourseNo'];
			$hrs=$_POST['txtHrs'];
			$college=$_POST['txtCollege'];
			$array=explode("-",$dept_code);//creating an array of dept code

			$query="INSERT INTO course (dept_code, course_name, course_no, credit_hours, college) VALUES ('$array[0]','$c_name','$c_No','$hrs','$college') ";

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
	<title> Add course</title>
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
				 	
				 	<img src="images/books.jpg" width="200px" height="200px" class="rounded shadow-lg" style="border-radius: 100px !important;padding: 4px;background-color: lightblue;"><br><br>
				 	<hr>
				 	<h3 class="display-4 text-info">Courses</h3>
				 	<p class="float-left"><small>Here you can add  courses to the system</small></p>
				 </div>
			</div>
			<div class="col-md-6">
				<form method="POST" action="prof-add-course.php<?php if(isset($_GET['c-code'])){echo"?c-code=".$_GET['c-code']."";}else{echo"?add=1";}?>">
  						<div class="form-group">
  							<h3 class="display-4 text-info" style="text-align: right;">Add a course</h3><hr style="background-color: black;">

    						<label for="name" class="text-info lead">Course name <span class="text-danger">*</span></label>
    						<input type="text" class="form-control shadow unround" id="txtName" name="txtCourseName" placeholder="Course name "  required>
  						</div>

  						<div class="form-group">
							<label for="name" class="text-info lead">Department Code <span class="text-danger">*</span></label>
	  						<select class="form-control unround shadow" id="drpType" name="drpDeptCode">
		  							<?php 
		  								$query="select dept_code,dept_name from department";
		  								$dataSet=mysqli_query($connection,$query);
		  								while($row=mysqli_fetch_assoc($dataSet)):
		  							 ?>
							      <option><?php echo"".$row['dept_code']."-";echo"".$row['dept_name'].""; ?></option>
							     <?php endwhile; ?>
						    </select>
						</div>
						 
						 <div class="row form-group">
						 	<div class="col">
    							<label for="office" class="text-info lead">Course No <span class="text-danger">*</span></label>
    							<input type="text" name="txtCourseNo" class="form-control shadow unround" id="txtOffice" placeholder="Course No" required>
  							</div>

	  						<div class="col">
	    						<label for="phone" class="text-info lead">Hours <span class="text-danger">*</span></label>
	    						<input type="text" name="txtHrs" class="form-control shadow unround" id="txtPassword" placeholder="Hours"  required>
	  						</div>
						 </div>   
						


  						<div class="form-group">
    						<label for="name" class="text-info lead">College <span class="text-danger">*</span></label>
    							<input type="text" name="txtCollege" class="form-control shadow unround" id="txtPassword" placeholder="College"  required>
  						</div>

  						<br>
  						<button class="btn btn-info float-right shadow" type="submit">Add <i class="far fa-edit"></i></button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>