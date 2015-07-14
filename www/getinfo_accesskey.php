<?php
	
	
	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if(!isset($_GET['id'])||!isset($_GET['accesskey'])){
		header("Location:editablepage.php");
		exit();
	}
	mysqli_query($link,'SET NAMES utf8');
	date_default_timezone_set('Asia/Taipei');
	$tdate=date("Y-m-d H:i:s");
	$ip = $_SERVER["REMOTE_ADDR"];
	$result=mysqli_query($link,"SELECT `location`, `value` FROM `file` WHERE `id`='".$_GET['id']."' and `accesskey`='".$_GET['accesskey']."'");
	
	$row = @mysqli_fetch_row($result);
	if($row[0]!=""){
		if(!isset($_COOKIE['Account'])){
			if($row[1]>0){
				header("Location:login.php?error_message=未登入,請先登入帳號&orig=getinfo.php?id=".$_GET['id']);
			}
			else{
				mysqli_query($link,"INSERT INTO `visitinfo`(`visitor`, `ip`, `target`, `date`) VALUES ('訪客','".$ip."','".$row[0]."','".$tdate."')");
				$foname="./tmp/".$_GET['accesskey'].".wav";
				$fo=fopen($foname,w);
				$fp=fopen($row[0],r);
				if(filesize($foname)!=filesize($row[0])){
					$content=fread($fp,filesize($row[0]));
					fwrite($fo,$content);
				}
				fclose($fo);
				fclose($fp);
				header("Location:$foname");
			}
		}
		else{
			if($_COOKIE["Value"]<$row[1]){
				echo"<script>alert(\"您的帳號權限不足\")</script>";
				header("Refresh:0;url=editablepage.php");
			}
			else{
				mysqli_query($link,"INSERT INTO `visitinfo`(`visitor`, `ip`, `target`, `date`) VALUES ('".$_COOKIE['Account']."','".$ip."','".$row[0]."','".$tdate."')");
				$foname="./tmp/".$_GET['accesskey'].".wav";
				$fo=fopen($foname,w);
				$fp=fopen($row[0],r);
				if(filesize($foname)!=filesize($row[0])){
					$content=fread($fp,filesize($row[0]));
					fwrite($fo,$content);
				}
				fclose($fo);
				fclose($fp);
				header("Location:$foname");
			}
		}
	}
	else{
		mysqli_query($link,"INSERT INTO `visitinfo`(`visitor`, `ip`, `target`, `date`) VALUES ('問題-試圖找尋檔案','".$ip."','".$_GET['accesskey']."','".$tdate."')");
		header("Location:editablepage.php");
	}
	mysqli_close($link);



?>