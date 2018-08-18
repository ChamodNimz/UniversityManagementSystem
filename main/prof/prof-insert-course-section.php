<?php 
	session_start();
	if(!isset($_SESSION['username']) && isset($_SESSION['password'] )){
		header('Location:index.php');
	}
	require_once('../dbConnection.php');
?>

<?php 

if(isset($_POST['drpcCode']) && isset($_POST['txtsec']) &&isset($_POST['txtyear'])){
	
		require_once('../dbConnection.php');
		

			$course=$_POST['drpcCode'];
			$secno=$_POST['txtsec'];
			$year=$_POST['txtyear'];
			$semester=$_POST['txtsem'];
			$classroom=$_POST['txtroom'];
			$classtime=$_POST['txttime'];
			$classsize=$_POST['txtsize'];
			$classpof=$_POST['drpprofid'];
			
			
			$arrayCid=explode("-",$course);
			$arraypid=explode("-",$classpof);
			$query="insert into course_section (course_code,section_no,year,semester,class_room	,class_time	,class_size,pid) values('$arrayCid[0]','$secno','$year','$semester','$classroom','$classtime','$classsize','$arraypid[0]')";
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
	<title>Add Course Section</title>
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
				 	
				 	<img src="images/student-girl.jpg" width="200px" height="200px" class="rounded shadow-lg" style="border-radius: 100px !important;padding: 4px;background-color: lightblue;"><br><br>
				 	<hr>
				 	<h3 class="display-5 text-info">Course Section</h3>
				 	<p class="float-left">
				 		Here you can add course sessions to the system
				 	</p>
				 </div>
			</div>
			<div class="col-md-6">
				<form method="POST" action="#">
  						<div class="form-group">
  							<h3 class="display-4 text-info" style="text-align: right;">Add Course Session</h3><hr style="background-color: black;">
    						
    						<div class="form-group">
    								<label for="drpcCode" class="text-info lead">Course Code <span class="text-danger">*</span></label>
    								<select class="form-control unround shadow" id="drpcCode" name="drpcCode">
	  							<?php 
	  								$query="select course_code,course_name from course";
	  								$dataSet=mysqli_query($connection,$query);
	  								while($row=mysqli_fetch_assoc($dataSet)):
	  							 ?>
						      	<option><?php echo"".$row['course_code']."-";echo"".$row['course_name'].""; ?></option>
						     	<?php endwhile; ?>
								</select>
							</div>
							<div class="row">
								<div class="col">
    								<label for="txtsec" class="text-info lead">Section No <span class="text-danger">*</span></label>
    								<input type="text" class="form-control shadow unround" id="txtsec" name="txtsec" placeholder="section number" >
    							</div>
    							<div class="col">
    								<label for="txtyear" class="text-info lead">year <span class="text-danger">*</span></label>
    								<input type="text" class="form-control shadow unround" id="txtyear" name="txtyear" placeholder="year" >
    							</div>
							</div>
    							

    						
    					
    					<div class="form-group">
	    						<div class="row">
		    						<div class="col">
		    							<label for="txtsem" class="text-info lead">Semester <span class="text-danger">*</span></label>
		    					<input type="text" class="form-control shadow unround" id="txtsem" name="txtsem" placeholder="Semester" >
		    						</div>
		    						<div class="col">
		    							<label for="txtroom" class="text-info lead">Class Room <span class="text-danger">*</span></label>
		    					<input type="text" class="form-control shadow unround" id="txtroom" name="txtroom" placeholder="Class Room" >
		    						</div>
		    						
	    					</div>
    					</div>
    					
    					
    					<div class="form-group">
    						<div class="row">
    							<div class="col">
    								<label for="txttime" class="text-info lead">Class Time <span class="text-danger">*</span></label>
    					<input type="text" class="form-control shadow unround" id="txttime" name="txttime" placeholder="Time" >
    							</div>
    							<div class="col">
    								<label for="txtsize" class="text-info lead">Class Size <span class="text-danger">*</span></label>
    					<input type="text" class="form-control shadow unround" id="txtsize" name="txtsize" placeholder="Size" >
    							</div>
    						</div>
    					</div>
    				<div class="form-group">
		    							<label for="drpprofid" class="text-info lead">Professor ID <span class="text-danger">*</span></label>
		    							<select class="form-control unround shadow" id="drpprofid" name="drpprofid">
	  							<?php 
	  								$query="select pid,profName from  professor";
	  								$dataSet=mysqli_query($connection,$query);
	  								while($row=mysqli_fetch_assoc($dataSet)):
	  							 ?>
						      <option><?php echo"".$row['pid']."-";echo"".$row['profName'].""; ?></option>
						     <?php endwhile; ?>
						</select>
		    		</div>
    					
    					
  						</div> 		
  						<br>
  						<button class="btn btn-info float-right shadow" type="submit">Add <i class="far fa-edit"></i></button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>