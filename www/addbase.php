<!DOCTYPE html>
<html>
	<head>
		<title>新增欄位</title>
		<meta charset="utf-8">
		<link href="./css/management.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="header-wrapper">
			<div style="float:right; text-align:right; color:red;">歡迎~ 管理者 &nbsp &nbsp &nbsp </div>
			<div id="header" class="container">
			<div id="logo"><span><a href="./index.php"><img src="./images/sinicalogo.gif" height=150 width=150 ></a></span>	
			</div><div id="menu"><ul>
			<li><a href="./management_admin.php">管理帳號</a></li>
			<li><a href="./management_web.php">管理網頁</a></li>
			<li><a href="./management_valid_path.php">管理檔案路徑</a></li>
			<li class="active"><a href="./management_editableweb.php">管理公開檔案</a></li>
			<li><a href="./index.php">回首頁</a></li>
			</ul></div></div></div><br><center>
		<?php
			if(isset($_GET['orig'])){
				echo"<form method=\"post\" action=\"addbase_sql.php?orig=".$_GET['orig']."\">";
			}
			else{
				echo"<form method=\"post\" action=\"addbase_sql.php\">";
			}
		?>
			<table>
			<tr><td>名稱:</td><td><input type="text" name="W_Name" maxlength="20"  required></td></tr>
			<tr><td>權限:</td><td><select name="W_Value">
					<option value="0">訪客可看</option>
					<option value="1">訪客不可看</option>	
			</select>
			</td></tr>
			<tr><td>排序:</td><td><select name="W_Order">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="0">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
				</select>
			</td></tr></table>
			<input type="submit" value="確定">
			
			<?php
				if(isset($_GET['orig'])){
					echo"<input type=\"button\" onClick=\"location.href='./".$_GET['orig']."'\" value='取消'>";
				}
				else{
					echo"<input type=\"button\" onClick=\"location.href='management_editableweb.php'\" value='取消'>";
				}
			
			?>
		</form>
		</center>
	</body>
</html>