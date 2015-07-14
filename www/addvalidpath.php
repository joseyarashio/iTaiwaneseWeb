<?php

	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_query($link,'SET NAMES utf8');
	date_default_timezone_set('Asia/Taipei');
	
	
	$tdate=date("Y-m-d H:i:m");
	$_POST['A_Valid_path']=str_replace("\\","/",$_POST['A_Valid_path']);
	if(strpos($_POST['A_Valid_path'],"C:/wamp/www")!==false){
		$_POST['A_Valid_path']="./".substr($_POST['A_Valid_path'],12);
	}
	if(is_dir($_POST['A_Valid_path'])){
		$result=mysqli_query($link,"INSERT INTO `itaiwanese`.`value_c` (`name`, `value`,`date`) VALUES ('valid_path','".$_POST['A_Valid_path']."','".$tdate."');");
		if($result==""){
			echo"<script>alert(\"已有重複的路徑,如果不是請回報s1010.ycu@gmail.com\");</script>";
			header("Refresh:0;url=addvalidpath.html"); 
			
		}
		else{
			header("Location:update_file.php"); 
		}
	}
	else{
		echo"<script>alert(\"不存在的路徑-".$_POST['A_Valid_path']."\");</script>";
		header("Refresh:0;url=addvalidpath.html"); 
	}
?>