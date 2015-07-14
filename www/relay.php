<?php
	
	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	mysqli_query($link,'SET NAMES utf8');
	date_default_timezone_set('Asia/Taipei');
	$tdate=date("Y-m-d H:i:s");
	$ip = $_SERVER["REMOTE_ADDR"];
	$result=mysqli_query($link,"SELECT `location`, `value` FROM `web` WHERE id=\"".$_GET['id']."\"");
	
	
	$row = @mysqli_fetch_row($result);
	if(!isset($_COOKIE['Account'])){
		if($row[1]>0){
			header("Location:login.php?error_message=未登入,請先登入帳號&orig=relay.php?id=".$_GET['id']);
		}
		else{
			
			mysqli_query($link,"INSERT INTO `visitinfo`(`visitor`, `ip`, `target`, `date`) VALUES ('訪客','".$ip."','".$row[0]."','".$tdate."')");
			header("Location:$row[0]");
		}
	}
	else{
		if($_COOKIE["Value"]<$row[1]){
			echo"<script>alert(\"您的帳號權限不足\")</script>";
			header("Refresh:0;url=home.php");
		}
		else{
			mysqli_query($link,"INSERT INTO `visitinfo`(`visitor`, `ip`, `target`, `date`) VALUES ('".$_COOKIE['Account']."','".$ip."','".$row[0]."','".$tdate."')");
			header("Location:$row[0]");
		}
	}
	mysqli_close($link);


?>