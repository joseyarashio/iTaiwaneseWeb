<?php
	
	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	$fp = fopen($_GET['paths'], 'r');
	$content=fread($fp,filesize($_GET['paths']));
	$pos = strpos($content,"\$result=mysqli_query(\$link,\"SELECT  `value` FROM `account` WHERE `account`='\".\$_COOKIE['Account'].\"'\");");
	fclose($fp);
	$data="<?php \$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
		if (mysqli_connect_errno()){
			echo \"Failed to connect to MySQL: \" . mysqli_connect_error();
		}
		mysqli_query(\$link,'SET NAMES utf8');	
		if(isset(\$_COOKIE['Account'])){
			\$result=mysqli_query(\$link,\"SELECT  `value` FROM `account` WHERE `account`='\".\$_COOKIE['Account'].\"'\");
			\$row = mysqli_fetch_row(\$result);
			if(\$row[0]==\"\"){
				\$value=0;
			}
			else{
				\$value=\$row[0];
			}
		}
		else{
			\$value=0;
		}
		\$result=mysqli_query(\$link,\"SELECT  `value` FROM `web` WHERE `location`='".$_GET['paths']."'\");
		\$row = mysqli_fetch_row(\$result);
		if(\$value<\$row[0]){
			echo\"<script>alert(\\\"權限不足或帳號已登出\\\");</script>\";
			\$url=\"權限不足或帳號已登出\";
			\$EncodeStr=urlencode(\$url);
			date_default_timezone_set('Asia/Taipei');
			\$datetime=date(\"Y-m-d H:i:s\");
			\$ip = \$_SERVER[\"REMOTE_ADDR\"];
			mysqli_query(\$link,\"INSERT INTO `visitinfo`(`visitor`, `ip`, `target`, `date`) VALUES ('問題','\".\$ip.\"','".$_GET['paths']."','\".\$datetime.\"')\");
			header(\"Refresh:0;url=";
		
		$num=explode("/",$_GET['paths']);
		if(count($num)==1){
			$data=$data."./";
		}
		for($i=1;$i<count($num);$i++){
			$data=$data."../";
		}
		
		$data=$data."login.php?error_message=\$EncodeStr\");
			exit();
		}
	?>";
	
	if($pos===false){
		$fp = fopen($_GET['paths'], 'r');
		$content="";
		$content=fread($fp,filesize($_GET['paths']));
		fclose($fp);
		$fp = fopen($_GET['paths'], 'w');
		fwrite($fp,$data);
		fwrite($fp,$content);
		fclose($fp);
		header("Location:management_web.php");
	}
	else{
		$fp = fopen($_GET['paths'], 'r');
		$content="";
		$content=fread($fp,filesize($_GET['paths']));
		fclose($fp);
		$content=substr($content,strpos($content,"login.php?error_message=\$EncodeStr\");")+59);
		$fp = fopen($_GET['paths'], 'w');
		fwrite($fp,$data);
		fwrite($fp,$content);
		fclose($fp);
		header("Location:management_web.php"); 
		echo $content;
	}
	

?>