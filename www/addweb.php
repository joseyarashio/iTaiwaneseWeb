<?php

	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if ($_FILES["file"]["error"] > 0){ 
		echo"Error:".$_FILES["file"]["error"];
	}
	
	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	mysqli_query($link,'SET NAMES utf8');
	
	
	$paths="";
	$find=0;
	findWaves("./");
	
	
	
	if($find==1&&$GLOBALS['paths'][2]=="/"){
		$GLOBALS['paths']=substr($GLOBALS['paths'],0,2).substr($GLOBALS['paths'],3);
	}
	
	
	
	function findWaves($dir){
		if(is_dir($dir)){
			$dh = opendir($dir);
			chdir($dir);
			while (($file = readdir($dh)) != false&&$GLOBALS['find']!=1) {
				if(is_dir($file) && basename($file) != "." && basename($file) != ".."){
					findWaves($file);
				}
				else{
					$cur_path=getcwd();
					$path=$_FILES["file"]["name"];
					$path=iconv('utf-8','big5',$path);
					if(file_exists($path)){
						if($_FILES['file']['size']==filesize($path)){
							$cur_path=iconv('big5','utf-8',$cur_path);
							$GLOBALS['paths']="./".substr($cur_path,12)."/".$_FILES["file"]["name"];
							$GLOBALS['find']=1;			
						}
					}
				}
			}
			chdir("../");
			closedir($dh);
		}
	}
	
	if($find==0){
		echo"<script>alert(\"您的路徑並未在有效路徑內,請檢查,如還是有問題,請聯絡s1010.ycu@gmail.com\");</script>";
		header("Refresh:0;url=management_web.php"); 
	}
	else{
		$paths=str_replace("\\","/",$paths);
		$result=mysqli_query($link,"INSERT INTO `itaiwanese`.`web` (`location`, `value`, `name`,`order`) VALUES ('".$paths."', '".$_POST['W_Value']."', '".$_POST['W_Name']."','".$_POST['W_Order']."');");
		if($result==""){
			echo"<script>alert(\"新增時發生問題,請在試一次,如果還是有問題請email至s1010.ycu@gmail.com\");</script>";
			header("Refresh:0;url=addaccount.html"); 
			
		}
		else{
			if(substr($paths,-3)=="php"){
				header("Location:addsecondvalid.php?paths=".$paths);
			}
			else{
				header("Location:management_web.php");
			}			
		}
	}
	mysqli_close($link);

?>