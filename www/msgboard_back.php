<?php
//宣告使用utf-8編碼
 header("Content-Type:text/html; charset=utf-8");
//error_reporting(E_ALL); //除錯用
if(!isset($_SESSION)){ session_start(); }  //判斷session是否已啟動

//判斷ans_ckword及anscheck這2者是否為空，如不為空是否等於
if((!empty($_SESSION['ans_ckword'])) && (!empty($_POST['anscheck'])) && ($_SESSION['ans_ckword'] == $_POST['anscheck'])){
	 $_SESSION['ans_ckword'] = ''; //通過後，清空ans_ckword值
	 input_data();
	 echo"<script>alert(\"驗證成功\");</script>";
	 header("Refresh:0;url=home.php");
	 exit();
}
else{  //不通過則執行
	creat_check();
     echo"<script>alert(\"驗證失敗\");</script>";
	 header("Refresh:0;url=msgboard_front.php");
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

function input_data(){
 

 # Initialization

 $name=$_POST['name'];
 
 $content=$_POST['content'];
 $content = str_replace("<","&lt",$content);
 $content = str_replace(">","&gt",$content);
 $msgdate=$_POST['msgdate'];

 $mail=0;$phone=0;$no_name=0;
 if(isset($_POST['acco'])){
	$acco=$_POST['acco'];
 }
 else{
	$acco='no';
	$name = "訪客-".$name;
 }
 if(isset($_POST['mail'])){
	$mail=$_POST['mail'];
 }
 if(isset( $_POST['phone'])){
	$phone=$_POST['phone'];
 }
 if(isset($_POST['no_name'])){
	$no_name=isset($_POST['no_name']) ? 1 : 0;
 }
 #####################################
 $db_host = "localhost";
 $db_username = "user";  //登入帳號
 $db_pass = "user"; 	//登入密碼
 $db_name = "itaiwanese";		//資料庫
 //$db_port = "3306";
 $dbc = mysqli_connect($db_host,$db_username,$db_pass) or die ("could not connect to mysql");
 mysqli_query($dbc,"SET NAMES 'utf8'");
 mysqli_select_db($dbc,$db_name)or die ("could not connect to database");

 $query = "Insert into message_board( account ,username,  content , mail , phone, noname, msgdate)". 
							 "Values('$acco','$name' ,'$content' ,'$mail' ,'$phone' , '$no_name', '$msgdate');";
 $result = mysqli_query($dbc, $query )or die('Error querying database.' );

 mysqli_close($dbc);
 echo $name."<br>";
 echo $content."<br>";
#header("Location:msgboard_front.php");
#echo "<meta http-equiv=\"refresh\" content=\" 0;\" />";
//echo "Please wait for a moment ... \n";
}
?>