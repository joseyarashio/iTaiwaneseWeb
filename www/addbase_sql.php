<?php

	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	
	
	mysqli_query($link,'SET NAMES utf8');
	
	date_default_timezone_set('Asia/Taipei');
	
	
	$tdate=date("Y-m-d H:i:s");
	
	$result=mysqli_query($link,"INSERT INTO `itaiwanese`.`filebase` (`name`, `rank`,`date`,`value`) VALUES ('".$_POST['W_Name']."', '".$_POST['W_Order']."','".$tdate."','".$_POST['W_Value']."');");
	if($result==""){
		echo"<script>alert(\"已有同樣名稱的欄位\");</script>";
		
		if(isset($_GET['orig'])){
			header("Refresh:0;url=addbase.php?orig=".$_GET['orig']); 
		}
		else{
			header("Refresh:0;url=addbase.php"); 
		}
		
	}
	else{
		if(isset($_GET['orig'])){
			header("Location:./".$_GET['orig']); 
		}
		else{
			header("Location:management_editableweb.php"); 
		}
	}
	mysqli_close($link);
	

?>