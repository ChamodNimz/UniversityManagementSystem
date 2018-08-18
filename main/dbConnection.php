<?php

	$connection=mysqli_connect("localhost","root","");
	$dataBase=mysqli_select_db($connection,"university");
	 if(!$connection)
 	{
	 die('Connection Failed'.mysql_error());
 	}
	//configuring the data base

?>