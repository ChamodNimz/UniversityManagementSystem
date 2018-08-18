<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Landing Page</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<link rel="stylesheet" type="text/css" href="../../css/clock.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js"></script>
</head>
<body>

	<?php include('navigation.php'); ?>
	<!-- navigation finish-->
	<?php
 	if(isset($_SESSION['username']) && isset($_SESSION['password']))
 	{
 		
 	}
 	else
 	{
 		header('Location:index.php');
 	}
?>
	<!--contents -->
	<img src="images/old-wise.jpg" style="width: 100%;height:auto; background-position: fixed;
			background-repeat: no-repeat;">
		
</body>
</html>