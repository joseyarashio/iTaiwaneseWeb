<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title> Mssage Board</title>
		<link rel = "stylesheet" href = "css/css_hw5_2.css" type = "text/css" />
		<link href="./css/management.css" rel="stylesheet" type="text/css">
		<script >
			function start(){
				var button = document.getElementById("reload_img");
				button.addEventListener("click",rollDice,false);
				dieImage = document.getElementById("rand_img");
				
				
			}
			function rollDice(){

				setImage(dieImage);
			}
			function setImage(dieImg){
				dieImg.setAttribute("src","./msgboard_showpic.php");
				//dieImg.setAttribute("src","./tes.jpg");
			}
			function deleteCheck(get_index){
				if(confirm("再次確認要刪除此留言?")){
					window.location.replace((location.pathname)+"?delete="+get_index);
				}
				else{
					
				}
			}

			window.addEventListener("load",start,false);
		</script>
	</head>

	<body >
		<div id="header-wrapper">
			<div style="float:right; text-align:right; color:red;">歡迎~ <?php if(isset($_COOKIE['Account'])){echo$_COOKIE['Account'];}?> &nbsp &nbsp &nbsp </div>
			<div id="header" class="container">
			<div id="logo"><span><a href="./index.php"><img src="./images/sinicalogo.gif" height=150 width=150 ></a></span>	
			</div><div id="menu"><ul>
			<?php if(isset($_COOKIE['Account'])){echo"<li><a href=\"./setting.php\">帳號資訊</a></li>";}?>
			<!-- <li><a href="./setting.php">帳號資訊</a></li> -->
			<?php
			if(isset($_COOKIE["Value"]) && $_COOKIE["Value"] == 10){
				echo"<li class=\"active\"><a href=\"./msgboard_front.php\">查看訊息</a></li>";
			}
			else{
				echo"<li class=\"active\"><a href=\"./msgboard_front.php\">發訊息給站主</a></li>";
			}?>
			<?php if(!isset($_COOKIE['Account'])){echo"<li><a href=\"./home.php\">回首頁</a></li>";}
				  else{echo"<li><a href=\"./index.php\">回首頁</a></li>";}?>
			<!-- <li><a href="./home.php">回首頁</a></li> -->
			</ul></div></div></div><br><center>
		<br>
			 <!-- 顯示留言板 mode -->		

		<br>
<?php
	$db_host = "localhost";
	$db_username = "user";  //登入帳號
	$db_pass = "user"; 	//登入密碼
	$db_name = "itaiwanese";		//資料庫
	//$db_port = "3306";
	$dbc = mysqli_connect($db_host,$db_username,$db_pass) or die ("could not connect to mysql");
	mysqli_query($dbc,"SET NAMES 'utf8'");
	mysqli_select_db($dbc,$db_name)or die ("could not connect to database");

	if(isset($_COOKIE["Value"]) && $_COOKIE["Value"] == 10){
	/* 管理者模式 */

			#$query = "SELECT * FROM message_board";
			if(isset($_GET['all']) && $_GET['all'] == 1){
				/* 設定是否顯示全部 */
				$all=1;
			}
			else{
				$all=0;
			}
			if(isset($_GET['delete'])){
				$DBdelete = $_GET['delete'];
				$query = "DELETE FROM `message_board` WHERE `index`='$DBdelete'";
				$result = mysqli_query($dbc, $query )or die('Error querying database.' );
			}
			if(isset($_GET['seal'])){
				/* 設定是否封存，交給之後的判斷式判斷"if( $get_seal == 0)"來確定要不要顯示 */
				$DBseal = $_GET['seal'];
				$query = "UPDATE `message_board` SET `seal`=1 WHERE `index`=".$DBseal;
				$result = mysqli_query($dbc, $query )or die('Error querying database.' );
			}
			if(isset($_GET['order'])){
				$order = $_GET['order'];
				

					$query = "SELECT * FROM `message_board` ORDER BY `".$order."` ".$_GET['by'];
					$result = mysqli_query($dbc, $query )or die('Error querying database.' );
					if($_GET['by'] == 'DESC'){
						$by = 'ASC';
					}
					else{
						$by = 'DESC';
					}

				/*
				SELECT * FROM `message_board` ORDER BY `message_board`.`content` ASC
				*/

			}
			else{
				$by    = 'DESC';
				$order = 'msgdate';
				$query = "SELECT * FROM `message_board` ORDER BY `".$order."` ".$by;
				$result = mysqli_query($dbc, $query )or die('Error querying database.' );
			}

			echo "<table border = 1>";
			echo "<thead>
					<tr  align=\"center\" > 
						 <th> <a href=\"msgboard_front.php?order=username&by=$by&all=$all \">姓名</a> </th> 
						 <th> <a href=\"msgboard_front.php?order=content&by=$by&all=$all \">留言內容</a> </th>  
						 <th> <a href=\"msgboard_front.php?order=mail&by=$by&all=$all \">email</a> </th> 
						 <th> <a href=\"msgboard_front.php?order=phone&by=$by&all=$all \">電話</a> </th> 
						 <th> <a href=\"msgboard_front.php?order=msgdate&by=$by&all=$all \">留言日期</a> </th> 
						 <th> 功能</th>	<th> 功能</th>				 
					</tr>
				</thead>";

			while ($row = mysqli_fetch_row($result)){
							
					$get_indx = $row[0];
					$get_acco = $row[1];
					$get_name = $row[2];
					$get_cont = $row[3];
					$get_mail = $row[4];
					$get_phne = $row[5];
					$get_nnam = $row[6];
					$get_date = $row[7];
					$get_seal = $row[8];
					
				if($all == 1){
					// &all= '$all'
					/* 顯示所有留言 */
					echo "<tr> <th>".$get_name."</th>";
					echo "<th>".$get_cont."</th>";
					echo "<th>"."<a href='mailto:".$get_mail."'</a>".$get_mail."</th>";
					echo "<th>".$get_phne."</th>";
					echo "<th>".$get_date."</th>";
					echo "<th>"."<input type='button'  onclick='deleteCheck(".$get_indx.")' value='刪除'></th>";
					if( $get_seal == 0){
						echo "<th>"."<a href= \" msgboard_front.php?seal='$get_indx'&all=$all \" ><input type='button' value='封存'></a></th>";
					}
					else{
						echo "<th>"."<input type='button' disabled='disabled' value='已封存'></th>";
					}
					echo "</tr>";
				}
				else{
					/* 不顯示封存留言 */
					if( $get_seal == 0){	
						/* 無封存記號 */
						echo "<tr> <th>".$get_name."</th>";
						echo "<th>".$get_cont."</th>";
						echo "<th>"."<a href='mailto:".$get_mail."'</a>".$get_mail."</th>";
						echo "<th>".$get_phne."</th>";
						echo "<th>".$get_date."</th>";
						echo "<th>"."<input type='button'  onclick='deleteCheck(".$get_indx.")' value='刪除'></th>";
						echo "<th>"."<a href= \" msgboard_front.php?seal='$get_indx'&all='$all' \" ><input type='button' value='封存'></a></th>";
						echo "</tr>";
					}	
				}					
			}
			echo  "</table><br>";

				echo "<a href= \" msgboard_front.php?all=1 \" ><input type='button' value='顯示所有留言'></a>";
			

		// mysqli_free_result($result); // 釋放佔用的記憶體 
		mysqli_close($dbc);
	}//end if
	else{
	/* 一般模式 */
	/* setcookie("Account", "pups003c", time()+3600); */
		echo "
		<form action=\"msgboard_back.php\" method=\"post\">
			<fieldset>
				<legend>留言</legend>
				<br>
			 ";
		if(isset($_COOKIE["Account"])){
			//echo "<input name =\"no_name\" type=\"checkbox\" />匿名<br>";
			$account = $_COOKIE["Account"];						
			$query = "SELECT * FROM `accountdata` WHERE account = '$account' ";
			$result = mysqli_query($dbc, $query )or die('Error querying database.' );
			
			if($row = mysqli_fetch_row($result)){
			/* 取得已註冊的帳號資料，回傳至留言版的資料庫 */
				$get_acco = $row[0];
				$get_name = $row[1];
				$get_id   = $row[2];
				$get_emal = $row[3];
				$get_phne = $row[4];
				
				echo $get_name."(".$account.")";
				echo "<input name = \"acco\" type = \"hidden\" value='$get_acco' />";
				echo "<input name = \"name\" type = \"hidden\" value='$get_name' />";
				echo "<input name = \"mail\" type = \"hidden\" value='$get_emal' />";
				echo "<input name =\"phone\" type = \"hidden\" value='$get_phne' />";
			}
			
			
		}
		else{
			/* 沒有註冊帳戶時，讓訪客自行輸入資料 */
			echo "訪客名稱 <input name =\"name\" type = \"text\" required />(必填)<br>";
			echo "email <input name =\"mail\" type = \"email\" required />(必填)<br>";
			echo "電話 <input name =\"phone\" type = \"text\" />";
			
			// [已解決]問題:訪客留言若和帳戶名稱相同時，會變成冒用人頭留言，因此名稱必須增加為訪客-XXX
		}
		date_default_timezone_set('Asia/Taipei');
		//$date=date("Y-m-d");
		$msgdate=date("Y-m-d H:i:s");
		echo "<input name=\"msgdate\" type =\"hidden\" value='$msgdate' />";
		echo "
				<br>
				主旨: <input name = \"subject\" type=\"text\"  value=\"請輸入主旨\" required />(必填)
				<br>
				內容:
				
				<textarea name =\"content\"rows=\"5\" cols=\"40\" required />請在此輸入內容</textarea>
				<br>

				<p>驗證碼:<input type=\"text\" name=\"anscheck\" size=\"10\" maxlength=\"10\" />
				<img src= \"./msgboard_showpic.php\" id=\"rand_img\">
				<input type=\"button\" id=\"reload_img\" value=\"換一組驗證碼\" />
				</p>				
				<br>
				<input type=\"reset\" value = \"重新填寫\" />
				<input type=\"submit\" value=\"確定送出\" />		
			</fieldset>		
		</form>
		";
	}//end else
?>
	</center>
	</body>
</html>