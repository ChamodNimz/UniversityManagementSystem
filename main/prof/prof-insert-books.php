<?php 
	session_start();
	if(!isset($_SESSION['username']) && isset($_SESSION['password'] )){
		header('Location:index.php');
	}
	require_once('../dbConnection.php');
?>

<?php 

if(isset($_POST['txtisbn']) && isset($_POST['txtpublisher']) &&isset($_POST['txtauther'])){
	
		require_once('../dbConnection.php');
		

			$Bisbn=$_POST['txtisbn'];
			$Bpublisher=$_POST['txtpublisher'];
			$Bauther=$_POST['txtauther'];
			$Byear=$_POST['txtyear'];
			$Btitle=$_POST['txttitle'];
			$Bname=$_POST['txtname'];
			$Bcourse=$_POST['drpcCode'];
			$Bpid=$_POST['drpProf'];
			$arrayCid=explode("-",$Bcourse);
			$arraypid=explode("-",$Bpid);
			$query="insert into book (isbn,publisher,auther,year,title,name,course_code,pid) values('$Bisbn','$Bpublisher','$Bauther','$Byear','$Btitle','$Bname','$arrayCid[0]','$arraypid[0]')";
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
	<title>book insert </title>
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
				 	<h3 class="display-4 text-info">Books</h3>
				 	<p class="float-left">
				 		Here you can add books to the system
				 	</p>
				 </div>
			</div>
			<div class="col-md-6">
				<form method="POST" action="#">
  						<div class="form-group">
  							<h3 class="display-4 text-info" style="text-align: right;">Insert Book Details</h3><hr style="background-color: black;">
    						
    						<div class="form-group">
    							<div class="row">
	    							<div class="col">
	    								<label for="txtname" class="text-info lead">ISBN <span class="text-danger">*</span></label>
	    								<input type="text" class="form-control shadow unround" id="txtisbn" name="txtisbn" placeholder="isbn" >
	    							</div>
	    							<div class="col">
	    								<label for="txtpublisher" class="text-info lead">Publisher <span class="text-danger">*</span></label>
	    								<input type="text" class="form-control shadow unround" id="txtpublisher" name="txtpublisher" placeholder="Publisher Name" >
	    							</div>
    							</div>
    						</div>
    						
    					
    					<div class="form-group">
	    						<div class="row">
		    						<div class="col">
		    							<label for="txtyear" class="text-info lead">Year <span class="text-danger">*</span></label>
		    					<input type="text" class="form-control shadow unround" id="txtyear" name="txtyear" placeholder="Year" >
		    						</div>
		    						<div class="col">
		    							<label for="txtpid" class="text-info lead">Professor ID <span class="text-danger">*</span></label>
		    							<select class="form-control unround shadow" id="drpType" name="drpProf">
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
    					</div>
    					
    					<div class="form-group">
    						<label for="txtauther" class="text-info lead">Auther <span class="text-danger">*</span></label>
    					<input type="text" class="form-control shadow unround" id="ttxtauther" name="txtauther" placeholder="Auther Name" >
    						
    					</div>
    					<div class="form-group">
    						<div class="row">
    							<div class="col">
    								<label for="txttitle" class="text-info lead">Book Title <span class="text-danger">*</span></label>
    					<input type="text" class="form-control shadow unround" id="txttitle" name="txttitle" placeholder="Title" >
    							</div>
    							<div class="col">
    								<label for="txtname" class="text-info lead">Book Name <span class="text-danger">*</span></label>
    					<input type="text" class="form-control shadow unround" id="txtname" name="txtname" placeholder="Name" >
    							</div>
    						</div>
    					</div>
    				
    					<label for="txtcoursecode" class="text-info lead">Course Code <span class="text-danger">*</span></label>
    					<select class="form-control unround shadow" id="drpType" name="drpcCode">
	  							<?php 
	  								$query="select course_code,course_name from course";
	  								$dataSet=mysqli_query($connection,$query);
	  								while($row=mysqli_fetch_assoc($dataSet)):
	  							 ?>
						      <option><?php echo"".$row['course_code']."-";echo"".$row['course_name'].""; ?></option>
						     <?php endwhile; ?>
						</select>
    					
  						</div> 		
  						<br>
  						<button class="btn btn-info float-right shadow" type="submit">Add Book <i class="far fa-edit"></i></button>
				</form>
			</div>
			
		</div>
	</div>
</body>
</html>