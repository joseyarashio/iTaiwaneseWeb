<?php
//宣告使用utf-8編碼
 header("Content-Type:text/html; charset=utf-8");
//error_reporting(E_ALL); //除錯用
if(!isset($_SESSION)){ session_start(); }  //判斷session是否已啟動

//判斷ans_ckword及anscheck這2者是否為空，如不為空是否等於
if((!empty($_SESSION['ans_ckword'])) && (!empty($_POST['anscheck'])) && ($_SESSION['ans_ckword'] == $_POST['anscheck'])){
	 $_SESSION['ans_ckword'] = ''; //通過後，清空ans_ckword值
	 input_register();
	 
	 exit();
}
else{  //不通過則執行
	creat_check();
	#echo '<p>&nbsp;</p><p>&nbsp;</p><a href="./register.html">驗證失敗，按此返回註冊頁</a>';
	 echo"<script>alert(\"驗證失敗\");</script>";
	 header("Refresh:0;url=register.html");
}
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
function input_register(){
	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_query($link,'SET NAMES utf8');
	date_default_timezone_set('Asia/Taipei');
	
	
	$tdate=date("Y-m-d H:i:s");
	
	$result=mysqli_query($link,"INSERT INTO `itaiwanese`.`account` (`account`, `password`, `value`,`date`,`redate`) VALUES ('".$_POST['R_Account']."', '".$_POST['R_Password']."', '1', '".$tdate."', '".$tdate."');");
	
	if($result==""){
		echo"<script>alert(\"帳號已有人使用\");</script>";
		header("Refresh:0;url=register.html");
			
	}
	else{
		echo"<script>alert(\"註冊成功\");</script>";
		header("Refresh:0;url=index.php");
	}
	mysqli_query($link,"INSERT INTO `itaiwanese`.`accountdata` (`account`, `name`, `idenity`,`email`,`phone`,`reason`) VALUES ('".$_POST['R_Account']."', '".$_POST['R_Name']."', '".$_POST['R_Idenity']."', '".$_POST['R_Email']."', '".$_POST['R_Phone']."', '".$_POST['R_Reason']."');");
	
	
	mysqli_close($link);
}
?>