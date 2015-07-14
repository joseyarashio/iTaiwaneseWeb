<?php

	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	mysqli_query($link,'SET NAMES utf8');
	
	date_default_timezone_set('Asia/Taipei');
	$tdate=date("Y-m-d H:i:s");
	
	
	
	for($i=0;$i<$_POST['all'];$i++){
		if($_POST['W_Endtime'.$i]!=""){
			$endtimepart=explode(" ",$_POST['W_Endtime'.$i]);
			$endfrontpart=explode("/",$endtimepart[0]);
			$endtime=$endfrontpart[2]."-".$endfrontpart[0]."-".$endfrontpart[1]." ".$endtimepart[1].":00";
		}
		
		if($_POST['W_Endtime'.$i]!=""){
			$result=mysqli_query($link,"INSERT INTO `itaiwanese`.`file` (`name`, `location`,`value`,`base`,`start`,`end`,`accesskey`) VALUES ('".$_POST['W_Name_'.$i]."', '".$_POST['file_'.$i]."','".$_POST['W_Value'.$i]."','".$_POST['W_Base']."','".$tdate."','".$endtime."','".chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122))."');");
			
		}
		else{
			$result=mysqli_query($link,"INSERT INTO `itaiwanese`.`file` (`name`, `location`,`value`,`base`,`start`,`accesskey`) VALUES ('".$_POST['W_Name_'.$i]."', '".$_POST['file_'.$i]."','".$_POST['W_Value'.$i]."','".$_POST['W_Base']."','".$tdate."','".chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122))."');");
		}
	}
	
	
	
	if(isset($_GET['orig'])){
		header("Location:./".$_GET['orig']); 
	}
	else{
		header("Location:management_file.php?filebase=".$_POST['W_Base']); 
	}
	
	mysqli_close($link);

?>