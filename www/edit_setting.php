<?php
	
		
	
		$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
			
			
		mysqli_query($link,'SET NAMES utf8');
		$result=mysqli_query($link,"SELECT * FROM `accountdata` WHERE `account`='".$_COOKIE['Account']."'");
		
		
			
		echo"<!DOCTYPE html><html><head><title>management</title><meta charset=\"utf-8\"><link href=\"./css/management.css\" rel=\"stylesheet\" type=\"text/css\">
		<script>
		function EditWebPost(){
			result=\"\";
			result+=document.getElementById(\"account\").value+\"!!!\";	
			result+=document.getElementById(\"name\").value+\"!!!\";
			result+=document.getElementById(\"idenity_value\").value+\"!!!\";
			result+=document.getElementById(\"email\").value+\"!!!\";
			result+=document.getElementById(\"phone\").value;
			document.getElementById(\"PostValue\").value=result;
			document.getElementById(\"SendValue\").submit();
		}
		function CreatOption(id,sel,len)
		{var N_value=[\"學生\",\"教師\",\"研究人員\",\"其它\"];
		result=\"<select id=\\\"\"+id+\"_value\\\">\";
		for(i=0;i<len;i++){ if(N_value[i]==sel){
		result+=\"<option value=\\\"\"+N_value[i]+\"\\\" selected>\"+N_value[i]+\"</option>\";}else{
		result+=\"<option value=\\\"\"+N_value[i]+\"\\\" >\"+N_value[i]+\"</option>\";}}
		result+=\"</select>\";document.writeln(result);}</script></head><body><div id=\"header-wrapper\">
			<div style=\"float:right; text-align:right; color:red;\">歡迎~ 管理者 &nbsp &nbsp &nbsp </div>
			<div id=\"header\" class=\"container\">
			<div id=\"logo\"><span><a href=\"./index.php\"><img src=\"./images/sinicalogo.gif\" height=150 width=150 ></a></span>	
			</div><div id=\"menu\"><ul>
			<li class=\"active\"><a href=\"./setting.php\">帳號資訊</a></li>";
			if($_COOKIE['Value']==10){
				echo"<li><a href=\"./msgboard_front.php\">查看訊息</a></li>";
			}
			else{
				echo"<li><a href=\"./msgboard_front.php\">發訊息給站主</a></li>";
			}
			echo"<li><a href=\"./index.php\">回首頁</a></li>
			</ul></div></div></div><br><center>
		<table border=\"1\">";
		$row = mysqli_fetch_row($result);
		
		echo "<tr><td>帳號</td><td><input size=\"10\" type=\"text\" id=\"account\" value=\"".$row[0]."\" disabled=\"disabled\"></td></tr><tr><td>名子</td><td><input size=\"10\" type=\"text\" id=\"name\" value=\"".$row[1]."\" ></td></tr><tr><tr><td>身分:</td><td><script>CreatOption(\"idenity\",\"".$row[2]."\",4);</script></td></tr><tr><tr><td>e-mail:</td><td><input size=\"40\" type=\"text\" id=\"email\" value=\"".$row[3]."\" ></td></tr><tr><tr><td>電話:</td><td><input size=\"20\" type=\"text\" id=\"phone\" value=\"".$row[4]."\" ></td></tr></table><br><input type=\"button\" onClick=\"EditWebPost()\" value='儲存'></center>";
		
		echo"<input type=\"button\" onClick=\"location.href='./setting.php'\" value='取消'></center>";
		
		echo "<form action=\"edit_setting_sql.php\" method=\"post\" id=\"SendValue\"><input type=\"hidden\" id=\"PostValue\" name=\"PostValue\"></form></body></html>";
		mysqli_close($link);
		
	
?>
	