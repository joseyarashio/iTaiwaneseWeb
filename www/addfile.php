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
		
		$result=explode("!!!",$_POST['PostValue']);
		if(count($result)<2){
			echo"<script>alert(\"至少選擇一個檔案\");</script>";
			header("Refresh:0;url=addnewfile.php?filebase=".$_POST['W_Base']);
			exit();
		}
		
		echo"<!DOCTYPE html><html><head><title>管理帳號</title><meta charset=\"utf-8\"><link href=\"./css/management.css\" rel=\"stylesheet\" type=\"text/css\">
		<link href=\"http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css\" rel=\"stylesheet\">
		<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
		<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js\"></script>
		<link href=\"jQuery-Timepicker-Addon-master/src/jquery-ui-timepicker-addon.css\" rel=\"stylesheet\"></link>
		<script src=\"jQuery-Timepicker-Addon-master/src/jquery-ui-timepicker-addon.js\" type=\"text/javascript\"></script>
		<script src=\"jQuery-Timepicker-Addon-master/src/jquery-ui-sliderAccess.js\" type=\"text/javascript\"></script>	
		<script>
			function setsamename(all){
				if(document.getElementById(\"samename\").checked){
					for(var i=0;i<all;i++){
						var target='W_Name_'+i;
						var ntarget='file_name_'+i;
						document.getElementById(target).value=document.getElementById(ntarget).value;
					}
				}
				else{
					for(var i=0;i<all;i++){
						var target='W_Name_'+i;
						document.getElementById(target).value=\"\";
					}
				}
			}
			function setsamedate(id,all){
				if(document.getElementById(\"samedate\").checked){
					for(var i=0;i<all;i++){
						if(i!=id){
							var target='datetimepicker'+i;
							var dtarget='datetimepicker'+id;
							document.getElementById(target).value=document.getElementById(dtarget).value;
						}
					}
				}
				
			}
		</script>
		</head><body>
		<div id=\"header-wrapper\">
		<div style=\"float:right; text-align:right; color:red;\">歡迎~ 管理者 &nbsp &nbsp &nbsp </div>
		<div id=\"header\" class=\"container\">
		<div id=\"logo\"><span><a href=\"./index.php\"><img src=\"./images/sinicalogo.gif\" height=150 width=150 ></a></span>	
		</div><div id=\"menu\"><ul>
		<li><a href=\"./management_admin.php\">管理帳號</a></li>
		<li><a href=\"./management_web.php\">管理網頁</a></li>
		<li><a href=\"./management_valid_path.php\">管理檔案路徑</a></li>
		<li class=\"active\"><a href=\"./management_editableweb.php\">管理公開檔案</a></li>
		<li><a href=\"./index.php\">回首頁</a></li>
		</ul></div></div></div><br><center><input type=\"checkbox\" id=\"samename\" onchange=\"setsamename(".(count($result)-1).")\">名稱填入檔名&nbsp&nbsp<input type=\"checkbox\" id=\"samedate\">所有結束日期相同<br>";
		
		if(isset($_GET['orig'])){
			echo"<form method=\"post\" action=\"addfile_sql.php?orig=".$_GET['orig']."\">";
		}
		else{
			echo"<form method=\"post\" action=\"addfile_sql.php\">";
		}
		
		for($i=0;$i<count($result)-1;$i++){
			$name=substr($result[$i],strrpos($result[$i], "/")+1);
			echo"<table><caption>".$name."</caption>
			<tr><td>名稱:</td><td><input type=\"text\" id=\"W_Name_".$i."\" name=\"W_Name_".$i."\" maxlength=\"20\"  required></td></tr>
			<tr><td>位置:</td><td><input type=\"hidden\" id=\"file_name_".$i."\" value=\"".$name."\"><input type=\"hidden\" value=\"".$result[$i]."\" name=\"file_".$i."\"><input type=\"text\" value=\"".$result[$i]."\" disabled=\"disabled\"></td></tr>
			<tr><td>權限:</td><td><select name=\"W_Value".$i."\">
					<option value=\"0\">訪客可看</option>
					<option value=\"1\">訪客不可看</option>	
			</select>
			</td></tr>
			<tr><td>結束日期</td><td><input id=\"datetimepicker".$i."\" onchange=\"setsamedate(".$i.",".(count($result)-1).")\" type=\"text\" name=\"W_Endtime".$i."\">
			<script>
				$(document).ready(function(){ 
				$('#datetimepicker".$i."').datetimepicker();});
			</script></td></tr>
  
			</table>";
			
		}
		
		echo"<input type=\"hidden\" name=\"all\" value=\"".(count($result)-1)."\"><input type=\"hidden\" name=\"W_Base\" value=\"".$_POST['W_Base']."\"><input type=\"submit\"  value='新增'>&nbsp&nbsp";
		if(isset($_GET['orig'])){
			echo"<input type=\"button\" onClick=\"location.href='addnewfile.php?filebase=".$_POST['W_Base']."&orig=\"".$_GET['orig']."\"'\" value='取消'>";
		}
		else{
			echo"<input type=\"button\" onClick=\"location.href='addnewfile.php?filebase=".$_POST['W_Base']."'\" value='取消'>";
		}
		
		
		echo "</form></center></body></html>";
		
	}

?>