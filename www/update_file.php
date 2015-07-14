<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	
	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	mysqli_query($link,'SET NAMES utf8');
	
	date_default_timezone_set('Asia/Taipei');
	$tdate=date("Y-m-d H:i:s");
	
	$result=mysqli_query($link,"SELECT * FROM `value_c` where name='valid_path' and `value`!='.' ");
	if(isset($_GET['re'])){
		mysqli_query($link,"DELETE FROM `filedata` WHERE `date`<'".$tdate."'");
		mysqli_query($link,"ALTER TABLE `filedata` AUTO_INCREMENT = 1");
	}
	$str="";
	while ($row = mysqli_fetch_row($result)){
		
		$count=0;
		$real=0;
		$target=$row[2];
		list_all_file($target);
		if($real!=0){
			$str=$str.$target."更新".$real."個檔案    ";
		}
	}
	echo"<script>alert(\"".$str."\");</script>";
	header("Refresh:0;url=management_valid_path.php");
	
	function list_all_file($dir_path){
		if(is_dir($dir_path)){
			foreach(scandir($dir_path) as $file)
			{
				if($file != '.' && $file != '..')
				{
					list_all_file($dir_path . '/' . $file);
				}
			}
		}    
		if(is_file($dir_path)){
			$dir_path=iconv('big5','utf-8',$dir_path);
			if(substr($dir_path,-3)=="wav"){
				
				$ask=mysqli_query($GLOBALS['link'],"SELECT * FROM `filedata` where location='".$dir_path."'");
				$in = mysqli_fetch_row($ask);
				
				if($in[0]==""){
					mysqli_query($GLOBALS['link'],"INSERT INTO `filedata`(`location`, `under`, `date`) VALUES ('".$dir_path."','".$GLOBALS['target']."','".$GLOBALS['tdate']."')");
					$GLOBALS['real']++;
				}
				$GLOBALS['count']++;
			}
		}
	}
	//mysqli_query($link,"DELETE FROM `filedata` WHERE `date`<'".$tdate."'");
	
	//mysqli_query($link,"ALTER TABLE `filedata` AUTO_INCREMENT = 1");
	
	
	
	mysqli_close($link);

?>