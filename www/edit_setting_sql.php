<?php
	
	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		
	mysqli_query($link,'SET NAMES utf8');
		
	$result=explode("!!!",$_POST['PostValue']);
		
	mysqli_query($link,"UPDATE `accountdata` SET `name`='".$result[1]."',`idenity`='".$result[2]."',`email`='".$result[3]."',`phone`='".$result[4]."' WHERE `account`='".$result[0]."'");
		
		
	header("Location:setting.php");
	
	mysqli_close($link);

?>