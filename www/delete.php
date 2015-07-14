<?php
	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		mysqli_query($link,'SET NAMES utf8');
		if(!isset($_COOKIE['Value'])||$_COOKIE['Value']!=10){
			
			echo"<script>alert(\"權限不足或帳號已登出\");history.go(-1)</script>";
		}
		else{
			if($_POST["D_base"]=="account"){
				if(isset($_POST["D_name"])){
					mysqli_query($link,"DELETE FROM `account` WHERE account='".$_POST["D_name"]."'");
					header("Location:management_admin.php");
				}
				else if(isset($_POST["R_name"])){
					mysqli_query($link,"UPDATE `account` SET `password`='0000' WHERE account='".$_POST["R_name"]."'");
					header("Location:management_admin.php");
				}
			}
			else if($_POST["D_base"]=="web"){
				mysqli_query($link,"DELETE FROM `web` WHERE id='".$_POST["D_id"]."'");
				header("Location:management_web.php"); 
			}
			else if($_POST["D_base"]=="value_c"){
				mysqli_query($link,"DELETE FROM `value_c` WHERE id='".$_POST["D_id"]."'");
				header("Location:management_valid_path.php"); 
			}
			else if($_POST["D_base"]=="filebase"){
				
				mysqli_query($link,"DELETE FROM `filebase` WHERE name='".$_POST["D_name"]."'");
				if(isset($_POST['D_turn'])){
					header("Location:./".$_POST['D_turn']); 
				}
				else{
					header("Location:./management_editableweb.php"); 
				}
				
			}
			else if($_POST["D_base"]=="file"){
				
				mysqli_query($link,"DELETE FROM `file` WHERE id='".$_POST["D_id"]."'");
				
				header("Location:./management_file.php?filebase=".$_POST["D_rbase"]); 
				
				
			}
		}

?>