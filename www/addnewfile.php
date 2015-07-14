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
			
		echo"<!DOCTYPE html><html><head><title>新增檔案</title><meta charset=\"utf-8\"><link href=\"./css/management.css\" rel=\"stylesheet\" type=\"text/css\">
		<style>
		table{ border:0;border-collapse:collapse;}
		td{ font:normal 12px/17px Arial;padding:2px;}
		th{ font:bold 12px/17px Arial;text-align:left;padding:4px;border-bottom:1px solid #333;width:1000px;}
		.parent{ background:#FFF38F;cursor:pointer;}  
		.odd{ background:#FFFFEE;} 
		.selected{ background:#FF6500;color:#fff;}
		</style>

		<script src=\"http://www.codefans.net/ajaxjs/jquery1.3.2.js\" type=\"text/javascript\"></script>
		<script type=\"text/javascript\">
		$(function(){
		$('tr.parent').click(function(){
				$(this)
				.toggleClass(\"selected\")   
				.siblings('.child_'+this.id).toggle(); 	
			});	
		})
		var col=new Array();
		function allsel(id){
			var target='all_'+id;
			
			if(document.getElementById(target).checked){
				for(var i=1;i<col[id-1];i++){
					var tid=id+'_'+i;
					document.getElementById(tid).checked=true;
				}
			}
			else{
				for(var i=1;i<col[id-1];i++){
					var tid=id+'_'+i;
					document.getElementById(tid).checked=false;
				}
			}
		}
		
		function EditWebPost(all){
			var result=\"\";
			for(var i=0;i<all;i++){
				for(var j=1;j<col[i];j++){
					var tid=(i+1)+'_'+j;
					if(document.getElementById(tid).checked==true){
						var ttid=tid+'_value';
						result+=document.getElementById(ttid).value+\"!!!\";
					}
				}
			}
			document.getElementById(\"PostValue\").value=result;
			document.getElementById(\"SendValue\").submit();
		
		}
		</script>
		
		</head><body>
		<center><h1>請選擇檔案</h1>";
		
		
		$base=mysqli_query($link,"SELECT * FROM `value_c` WHERE `name`='valid_path'");
		$end=1;
		while ($row = mysqli_fetch_row($base)){
			$myfile=mysqli_query($link,"SELECT * FROM `filedata` WHERE `under`='".$row[2]."' ORDER BY `date` DESC");
			echo"<table border=1><tr class=\"parent\" id=\"row_0".$end."\"><th colspan=4><center>".substr($row[2],strrpos($row[2], "/")+1)."</center></th></tr><tr class=\"child_row_0".$end."\"><td><input type=\"checkbox\" onchange=\"allsel(".$end.")\"  id=\"all_".$end."\" >全選</td><td>檔名</td><td>位置</td><td>新增日期</td></tr>";
			
			$start=1;
			while ($data = mysqli_fetch_row($myfile)){
				echo"<tr class=\"child_row_0".$end."\"><td><input id=\"".$end."_".$start."\" type=\"checkbox\"><input type=\"hidden\" id=\"".$end."_".$start."_value\" value=\"".$data[1]."\"></td><td>".substr($data[1],strrpos($data[1], "/")+1)."</td><td>".$data[1]."</td><td>".$data[3]."</td></tr>";
				
				$start++;
			}
			echo"<script>col[".$end."-1]=".$start."</script>";
			echo"</table>";
			$end++;
		}
		
		echo"<input type=\"button\" onClick=\"EditWebPost(".$end.")\" value='新增'>&nbsp&nbsp";
		if(isset($_GET['orig'])){
			echo"<input type=\"button\" onClick=\"location.href='./".$_GET['orig']."'\" value='取消'>";
		}
		else{
			echo"<input type=\"button\" onClick=\"location.href='management_file.php?filebase=".$_GET['filebase']."'\" value='取消'>";
		}
		
		echo"</center>";
		
		
		if(isset($_GET['orig'])){
			echo "<form action=\"addfile.php?orig=".$_GET['orig']."\" method=\"post\" id=\"SendValue\"><input type=\"hidden\" id=\"PostValue\" name=\"PostValue\">";
		}
		else{
			echo "<form action=\"addfile.php\" method=\"post\" id=\"SendValue\"><input type=\"hidden\" id=\"PostValue\" name=\"PostValue\">";
		}
		
		
		echo"<input type=\"hidden\" name=\"W_Base\" value=\"".$_GET['filebase']."\"></form></body></html>";
			mysqli_close($link);
		}

?>
	