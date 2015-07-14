<?php $link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		mysqli_query($link,'SET NAMES utf8');	
		if(isset($_COOKIE['Account'])){
			$result=mysqli_query($link,"SELECT  `value` FROM `account` WHERE `account`='".$_COOKIE['Account']."'");
			$row = mysqli_fetch_row($result);
			if($row[0]==""){
				$value=0;
			}
			else{
				$value=$row[0];
			}
		}
		else{
			$value=0;
		}
		$result=mysqli_query($link,"SELECT  `value` FROM `web` WHERE `location`='./msgboard_showpic.php'");
		$row = mysqli_fetch_row($result);
		if($value<$row[0]){
			echo"<script>alert(\"權限不足或帳號已登出\");</script>";
			$url="權限不足或帳號已登出";
			$EncodeStr=urlencode($url);
			date_default_timezone_set('Asia/Taipei');
			$datetime=date("Y-m-d H:i:s");
			$ip = $_SERVER["REMOTE_ADDR"];
			mysqli_query($link,"INSERT INTO `visitinfo`(`visitor`, `ip`, `target`, `date`) VALUES ('問題','".$ip."','./msgboard_showpic.php','".$datetime."')");
			header("Refresh:0;url=../login.php?error_message=$EncodeStr");
			exit();
		}
	?><?php

//error_reporting(E_ALL); //除錯用
function creat_check(){
	$ans_str=0; $ans_now='';  //變數初始化
	$_SESSION['ans_ckword'] = '';
	mt_srand((double)microtime() * 1000000);  //重置隨機值
	//隨機取得6個小寫英字a-z
	for($i=0; $i<6; $i++){
		$ans_str = mt_rand(97,122);
		$ans_now .= chr($ans_str);
	}
	$_SESSION['ans_ckword'] = $ans_now;  //將值放至session
	
}
if(!isset($_SESSION)){ session_start(); }  //判斷session是否已啟動

creat_check();
$s_x=0; $s_y=0; $ans_right_move='';  //變數初始化

$im = imagecreate(85,26);

$red2 = imagecolorallocate($im,255,0,0);  //文字顏色

$gray2 = imagecolorallocate($im,200,200,200);  //背影顏色

imagefill($im,0,0,$gray2);

mt_srand((double)microtime() * 1000000);  //重置隨機值

//隨機30點
$s_dot = imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,128));
for($i=0; $i<30; $i++){
     imagesetpixel($im,mt_rand(10,75),mt_rand(5,20),$s_dot);
}

//文字隨機浮動
$s_x = mt_rand(5,10);
for($i=0; $i<6; $i++){
     $ans_right_move = substr($_SESSION['ans_ckword'],$i,1);
     $s_y = mt_rand(1,8);
     imagestring($im,5,$s_x,$s_y,$ans_right_move,$red2);
     $s_x = $s_x + mt_rand(8,14);
}

//輸出圖片
header('Content-type: image/png');

imagepng($im);

imagedestroy($im);

?>