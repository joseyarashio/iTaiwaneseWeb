<?php
	if(!isset($_COOKIE['Value'])||$_COOKIE['Value']!=10){
		//header("Location:login.php?error_message=權限不足");
		echo"<script>alert(\"權限不足或帳號已登出\");</script>";
		$url="權限不足或帳號已登出";
		$EncodeStr=urlencode($url);
		header("Refresh:0;url=login.php?error_message=$EncodeStr");
		
	}
	else{
		$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
			
			
		mysqli_query($link,'SET NAMES utf8');
		$result=mysqli_query($link,"SELECT * FROM `file` where `base`='".$_GET['filebase']."'");
		
		
			
		echo"<!DOCTYPE html><html><head><title>management</title><meta charset=\"utf-8\"><link href=\"./css/management.css\" rel=\"stylesheet\" type=\"text/css\">
		<link href=\"http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css\" rel=\"stylesheet\">
		<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
		<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js\"></script>
		<link href=\"jQuery-Timepicker-Addon-master/src/jquery-ui-timepicker-addon.css\" rel=\"stylesheet\"></link>
		<script src=\"jQuery-Timepicker-Addon-master/src/jquery-ui-timepicker-addon.js\" type=\"text/javascript\"></script>
		<script src=\"jQuery-Timepicker-Addon-master/src/jquery-ui-sliderAccess.js\" type=\"text/javascript\"></script>	
		<script>
		function EditWebPost(last){
			result=\"\";
			for(i=1;i<last;i++){
				str=i;
				result+=document.getElementById(str).value+\"!!!\";	
				str=i+\"_name\"
				result+=document.getElementById(str).value+\"!!!\";
				str=i+\"_location\"
				result+=document.getElementById(str).value+\"!!!\";
				str=i+\"_value\"
				result+=document.getElementById(str).value+\"!!!\";
				str=i+\"_enddate\"
				if(document.getElementById(str).value!=\"\")
					result+=document.getElementById(str).value+\"!!!\";
				else
					result+=\"NULL!!!\";
			}
			document.getElementById(\"PostValue\").value=result;
			document.getElementById(\"SendValue\").submit();
		}
		function CreatOption2(id,sel)
		{var name;result=\"<select id=\\\"\"+id+\"_value\\\">\";
		for(i=0;i<2;i++){ 
		if(i==0){name=\"訪客可看\";}else{name=\"訪客不可看\";}
		if(i==sel){
		result+=\"<option value=\\\"\"+i+\"\\\" selected>\"+name+\"</option>\";}else{
		result+=\"<option value=\\\"\"+i+\"\\\" >\"+name+\"</option>\";}}
		result+=\"</select>\";document.writeln(result);}</script></head><body><div id=\"header-wrapper\">
			<div style=\"float:right; text-align:right; color:red;\">歡迎~ 管理者 &nbsp &nbsp &nbsp </div>
			<div id=\"header\" class=\"container\">
			<div id=\"logo\"><span><a href=\"./index.php\"><img src=\"./images/sinicalogo.gif\" height=150 width=150 ></a></span>	
			</div><div id=\"menu\"><ul>
			<li><a href=\"./management_admin.php\">管理帳號</a></li>
			<li><a href=\"./management_web.php\">管理網頁</a></li>
			<li><a href=\"./management_valid_path.php\">管理檔案路徑</a></li>
			<li class=\"active\"><a href=\"./management_editableweb.php\">管理公開檔案</a></li>
			<li><a href=\"./index.php\">回首頁</a></li>
			</ul></div></div></div><br><center>
		<table border=\"1\"><tr><th>名稱</th><th>位置</th><th>權限</th><th>結束日期</th></tr>";
		$end=1;
		while ($row = mysqli_fetch_row($result)){
			if($row[6]!=""){
				$endtimepart=explode(" ",$row[6]);
				$endfrontpart=explode("-",$endtimepart[0]);
				$endtime=$endfrontpart[1]."/".$endfrontpart[2]."/".$endfrontpart[0]." ".substr($endtimepart[1],0,5);
			}
			else{
				$endtime="";
			}
			
			echo "<tr><td><input type=\"hidden\" id=\"".$end."\" value=\"".$row[0]."\"><input maxlength=\"20\" type=\"text\" id=\"".$end."_name\" value=\"".$row[1]."\"></td><td><input maxlength=\"50\" type=\"text\" id=\"".$end."_location\" value=\"".$row[2]."\"></td><td><script>CreatOption2(\"".$end."\",\"".$row[3]."\");</script></td><td><input id=\"".$end."_enddate\" value=\"".$endtime."\">
			<script>
				$(document).ready(function(){ 
				$('#".$end."_enddate').datetimepicker();});
			</script></td></tr>";
		$end++;
		}
	
		echo"</table><br><input type=\"button\" onClick=\"EditWebPost(".$end.")\" value='儲存'>&nbsp&nbsp&nbsp";
		if(!isset($_GET['orig'])){
			echo"<input type=\"button\" onClick=\"location.href='./management_file.php?filebase=".$_GET['filebase']."'\" value='取消'>";
		}
		else{
			echo"<input type=\"button\" onClick=\"location.href='./".$_GET['orig']."'\" value='取消'>";
		}
		echo"</center>";
		if(isset($_GET['orig']))
			echo "<form action=\"edit_file_sql.php?orig=".$_GET['orig']."&filebase=".$_GET['filebase']."\" method=\"post\" id=\"SendValue\">";
		else
			echo "<form action=\"edit_file_sql.php?filebase=".$_GET['filebase']."\" method=\"post\" id=\"SendValue\">";
		echo"<input type=\"hidden\" id=\"PostValue\" name=\"PostValue\"></form></body></html>";
		mysqli_close($link);
		
	}
?>
	