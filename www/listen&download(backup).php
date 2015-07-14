<?php $link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		mysqli_query($link,'SET NAMES utf8');	
		if(isset($_COOKIE['Account'])){
			$result=mysqli_query($link,"SELECT  `value` FROM `account` WHERE `account`='".$_COOKIE['Account']."'");
			$row = mysqli_fetch_row($result);
			if($row[0]==""){
				$value=0;
			}
			else{
				$value=$row[0];
			}
		}
		else{
			$value=0;
		}
		$result=mysqli_query($link,"SELECT  `value` FROM `web` WHERE `location`='./listen&download.php'");
		$row = mysqli_fetch_row($result);
		if($value<$row[0]){
			echo"<script>alert(\"權限不足或帳號已登出\");</script>";
			$url="權限不足或帳號已登出";
			$EncodeStr=urlencode($url);
			date_default_timezone_set('Asia/Taipei');
			$datetime=date("Y-m-d H:i:s");
			$ip = $_SERVER["REMOTE_ADDR"];
			mysqli_query($link,"INSERT INTO `visitinfo`(`visitor`, `ip`, `target`, `date`) VALUES ('問題','".$ip."','./listen&download.php','".$datetime."')");
			header("Refresh:0;url=../login.php?error_message=$EncodeStr");
			exit();
		}
	?><html>
<head>
<meta charset="UTF-8">
<title>聽打工作下載位置</title>
</head>
<body bgcolor=gray>
	
	<center>
		<h1>聽打工作下載</h1>
		<h2>可透過 右鍵點選連結 開啟選單 並選擇另存新檔 下載</h2>
		<hr>
		<h3>長庚大學多媒體實驗室語料</h3>
		<table border=1>
		<td><a href='./GitRepos/finish/TW03/_Liang_Min_Shiung_0.wav'>_Liang Min Shiung_0</a></td>
		<td><a></a></td>
		<td><a></a></td>
		<td><a></a></td>
		<td><a></a></td>
		<td><a></a></td>
		<tr>
		<td><a href='./GitRepos/finish/TW03/_Chen_Su_Nian_0.wav'>_Chen Su Nian_0</a></td>
		<td><a href='./GitRepos/finish/TW03/_Chen_Su_Nian_10.wav'>_Chen Su Nian_10</a></td>
		<td><a href='./GitRepos/finish/TW03/_Chen_Su_Nian_20.wav'>_Chen Su Nian_20</a></td>
		<td><a></a></td>
		<td><a></a></td>
		<td><a></a></td>
		<tr>
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_0.wav'>_Chen Tsau_0</a></td>	
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_10.wav'>_Chen Tsau_10</a></td>	
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_20.wav'>_Chen Tsau_20</a></td>	
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_30.wav'>_Chen Tsau_30</a></td>	
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_40.wav'>_Chen Tsau_40</a></td>	
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_50.wav'>_Chen Tsau_50</a></td>	
		<tr>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_0.wav'>_Tsai Feng An_0</a></td>	
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_10.wav'>_Tsai Feng An_10</a></td>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_20.wav'>_Tsai Feng An_20</a></td>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_30.wav'>_Tsai Feng An_30</a></td>
		<td><a></a></td>
		<td><a></a></td>
		<tr>
		</TABLE>
		<h3>長庚大學多媒體實驗室語料 壓縮分割載點</h3>
		<table border=1>
		<td><a href='./GitRepos/finish/TW03/_Liang_Min_Shiung_0.rar'>_Liang Min Shiung_0</a></td>
		<td><a></a></td>
		<td><a></a></td>
		<td><a></a></td>
		<tr>
		<td><a href='./GitRepos/finish/TW03/_Chen_Su_Nian_0.part1.rar'>_Chen Su Nian_0-1</a></td>
		<td><a href='./GitRepos/finish/TW03/_Chen_Su_Nian_0.part2.rar'>_Chen Su Nian_0-2</a></td>
		<td><a></a></td>
		<td><a></a></td>
		<tr>
		<td><a href='./GitRepos/finish/TW03/_Chen_Su_Nian_10.part1.rar'>_Chen Su Nian_10-1</a></td>
		<td><a href='./GitRepos/finish/TW03/_Chen_Su_Nian_10.part2.rar'>_Chen Su Nian_10-2</a></td>
		<td><a href='./GitRepos/finish/TW03/_Chen_Su_Nian_10.part3.rar'>_Chen Su Nian_10-3</a></td>
		<td><a></a></td>
		<tr>
		<td><a href='./GitRepos/finish/TW03/_Chen_Su_Nian_20.rar'>_Chen Su Nian_20</a></td>
		<td><a></a></td>
		<td><a></a></td>
		<td><a></a></td>
		<tr>
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_0.part1.rar'>_Chen Tsau_0-1</a></td>	
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_0.part2.rar'>_Chen Tsau_0-2</a></td>
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_0.part3.rar'>_Chen Tsau_0-3</a></td>
		<td><a></a></td>
		<tr>
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_10.part1.rar'>_Chen Tsau_10-1</a></td>
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_10.part2.rar'>_Chen Tsau_10-2</a></td>
		<td><a></a></td>
		<td><a></a></td>
		<tr>
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_20.part1.rar'>_Chen Tsau_20-1</a></td>	
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_20.part2.rar'>_Chen Tsau_20-2</a></td>
		<td><a></a></td>
		<td><a></a></td>
		<tr>
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_30.part1.rar'>_Chen Tsau_30-1</a></td>	
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_30.part2.rar'>_Chen Tsau_30-2</a></td>
		<td><a></a></td>
		<td><a></a></td>
		<tr>
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_40.part1.rar'>_Chen Tsau_40-1</a></td>	
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_40.part2.rar'>_Chen Tsau_40-2</a></td>
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_40.part3.rar'>_Chen Tsau_40-3</a></td>
		<td><a></a></td>
		<tr>
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_50.part1.rar'>_Chen Tsau_50-1</a></td>	
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_50.part2.rar'>_Chen Tsau_50-2</a></td>
		<td><a href='./GitRepos/finish/TW03/_Chen_Tsau_50.part3.rar'>_Chen Tsau_50-3</a></td>
		<td><a></a></td>
		<tr>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_0.part1.rar'>_Tsai Feng An_0-1</a></td>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_0.part2.rar'>_Tsai Feng An_0-2</a></td>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_0.part3.rar'>_Tsai Feng An_0-3</a></td>
		<td><a></a></td>
		<tr>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_10.part1.rar'>_Tsai Feng An_10-1</a></td>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_10.part2.rar'>_Tsai Feng An_10-2</a></td>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_10.part3.rar'>_Tsai Feng An_10-3</a></td>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_10.part4.rar'>_Tsai Feng An_10-4</a></td>
		<tr>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_20.part1.rar'>_Tsai Feng An_20-1</a></td>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_20.part2.rar'>_Tsai Feng An_20-2</a></td>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_20.part3.rar'>_Tsai Feng An_20-3</a></td>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_20.part4.rar'>_Tsai Feng An_20-4</a></td>
		<tr>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_30.part1.rar'>_Tsai Feng An_30-1</a></td>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_30.part2.rar'>_Tsai Feng An_30-2</a></td>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_30.part3.rar'>_Tsai Feng An_30-3</a></td>
		<td><a href='./GitRepos/finish/TW03/_Tsai_Feng_An_30.part4.rar'>_Tsai Feng An_30-4</a></td>
		<tr>
		</TABLE>
		<hr>
		<h3>大愛劇場 陪你看天星</h3>
		<table border=1>
		<td><a href='./trs/DaAiTV/blktc01.rar'>陪你看天星01</a></td>
		<td><a href='./trs/DaAiTV/blktc03.rar'>陪你看天星03</a></td>
		<tr>                                              
		<td><a href='./trs/DaAiTV/blktc05.rar'>陪你看天星05</a></td>
		<td><a href='./trs/DaAiTV/blktc07.rar'>陪你看天星07</a></td>
		<tr>                                              
		<td><a href='./trs/DaAiTV/blktc09.rar'>陪你看天星09</a></td>
		<td><a href='./trs/DaAiTV/blktc11.rar'>陪你看天星11</a></td>
		<tr>                                              
		<td><a href='./trs/DaAiTV/blktc13.rar'>陪你看天星13</a></td>
		<td><a href='./trs/DaAiTV/blktc15.rar'>陪你看天星15</a></td>
		<tr>                                              
		<td><a href='./trs/DaAiTV/blktc17.rar'>陪你看天星17</a></td>
		<td><a href='./trs/DaAiTV/blktc19.rar'>陪你看天星19</a></td>
		<tr>                                              
		<td><a href='./trs/DaAiTV/blktc21.rar'>陪你看天星21</a></td>
		<td><a href='./trs/DaAiTV/blktc23.rar'>陪你看天星23</a></td>
		<tr>                                              
		<td><a href='./trs/DaAiTV/blktc25.rar'>陪你看天星25</a></td>
		<td><a href='./trs/DaAiTV/blktc27.rar'>陪你看天星27</a></td>
		</TABLE>
		<hr>
		<h3>大愛劇場 畫人生</h3>
		<table border=1>
		<td><a href='./trs/DaAiTV/urs01.wav'>畫人生01</a></td>
		<td><a href='./trs/DaAiTV/urs04.wav'>畫人生04</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/urs07.wav'>畫人生07</a></td>
		<td><a href='./trs/DaAiTV/urs10.wav'>畫人生10</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/urs13.wav'>畫人生13</a></td>
		<td><a href='./trs/DaAiTV/urs16.wav'>畫人生16</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/urs19.wav'>畫人生19</a></td>
		<td><a href='./trs/DaAiTV/urs22.wav'>畫人生22</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/urs25.wav'>畫人生25</a></td>
		<td><a href='./trs/DaAiTV/urs28.wav'>畫人生28</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/urs31.wav'>畫人生31</a></td>
		<td><a href='./trs/DaAiTV/urs34.wav'>畫人生34</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/urs37.wav'>畫人生37</a></td>
		<td><a href='./trs/DaAiTV/urs40.wav'>畫人生40</a></td>
		</TABLE>
		<hr>
		<h3>大愛劇場 清秀佳人</h3>
		<table border=1>
		<td><a href='./trs/DaAiTV/csgr01.wav'>清秀佳人01</a></td>
		<td><a href='./trs/DaAiTV/csgr04.wav'>清秀佳人04</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/csgr07.wav'>清秀佳人07</a></td>
		<td><a href='./trs/DaAiTV/csgr10.wav'>清秀佳人10</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/csgr13.wav'>清秀佳人13</a></td>
		<td><a href='./trs/DaAiTV/csgr16.wav'>清秀佳人16</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/csgr19.wav'>清秀佳人19</a></td>
		<td><a href='./trs/DaAiTV/csgr22.wav'>清秀佳人22</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/csgr25.wav'>清秀佳人25</a></td>
		<td><a href='./trs/DaAiTV/csgr28.wav'>清秀佳人28</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/csgr31.wav'>清秀佳人31</a></td>
		<td><a href='./trs/DaAiTV/csgr34.wav'>清秀佳人34</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/csgr37.wav'>清秀佳人37</a></td>
		<td><a href='./trs/DaAiTV/csgr40.wav'>清秀佳人40</a></td>
		</TABLE>
		<hr>
		<h3>大愛劇場 美味人生</h3>
		<table border=1>
		<td><a href='./trs/DaAiTV/vvrs01.wav'>美味人生01</a></td>
		<td><a href='./trs/DaAiTV/vvrs04.wav'>美味人生04</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/vvrs07.wav'>美味人生07</a></td>
		<td><a href='./trs/DaAiTV/vvrs10.wav'>美味人生10</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/vvrs13.wav'>美味人生13</a></td>
		<td><a href='./trs/DaAiTV/vvrs16.wav'>美味人生16</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/vvrs19.wav'>美味人生19</a></td>
		<td><a href='./trs/DaAiTV/vvrs22.wav'>美味人生22</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/vvrs25.wav'>美味人生25</a></td>
		<td><a href='./trs/DaAiTV/vvrs28.wav'>美味人生28</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/vvrs31.wav'>美味人生31</a></td>
		<td><a href='./trs/DaAiTV/vvrs34.wav'>美味人生34</a></td>
		<tr>
		<td><a href='./trs/DaAiTV/vvrs37.wav'>美味人生37</a></td>
		<td><a href='./trs/DaAiTV/vvrs40.wav'>美味人生40</a></td>
		</TABLE>
		<hr>
		<h3>綠色和平 厝邊隔壁</h3>
		<table border=1>
		<td><a href='./trs/GreenPeace/Neighbor/20121027_Neighbor.wav'>厝邊隔壁01</a></td>
		<td><a href='./trs/GreenPeace/Neighbor/20121103_Neighbor.wav'>厝邊隔壁02</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/Neighbor/20121110_Neighbor.wav'>厝邊隔壁03</a></td>
		<td><a href='./trs/GreenPeace/Neighbor/20130420_Neighbor.wav'>厝邊隔壁04</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/Neighbor/20130504_Neighbor.wav'>厝邊隔壁05</a></td>
		<td><a href='./trs/GreenPeace/Neighbor/20130518_Neighbor.wav'>厝邊隔壁06</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/Neighbor/20130525_Neighbor.wav'>厝邊隔壁07</a></td>
		<td><a href='./trs/GreenPeace/Neighbor/20130615_Neighbor.wav'>厝邊隔壁08</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/Neighbor/20130706_Neighbor.wav'>厝邊隔壁09</a></td>
		<td><a href='./trs/GreenPeace/Neighbor/20130713_Neighbor.wav'>厝邊隔壁10</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/Neighbor/20130824_Neighbor.wav'>厝邊隔壁11</a></td>
		<td><a href='./trs/GreenPeace/Neighbor/20130921_Neighbor.wav'>厝邊隔壁12</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/Neighbor/20131109_Neighbor.wav'>厝邊隔壁13</a></td>
		<td><a href='./trs/GreenPeace/Neighbor/20131130_Neighbor.wav'>厝邊隔壁14</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/Neighbor/20140118_Neighbor.wav'>厝邊隔壁15</a></td>
		<td><a href='./trs/GreenPeace/Neighbor/20140201_Neighbor.wav'>厝邊隔壁16</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/Neighbor/20140208_Neighbor.wav'>厝邊隔壁17</a></td>
		<td><a href='./trs/GreenPeace/Neighbor/20140215_Neighbor.wav'>厝邊隔壁18</a></td>
		</TABLE>
		<hr>
		<h3>綠色和平 阿練來泡茶</h3>
		<table border=1>
		<td><a href='./trs/GreenPeace/ALen&Tea/20121028_ALen&Tea.wav'>阿練來泡茶01</a></td>
		<td><a href='./trs/GreenPeace/ALen&Tea/20121104_ALen&Tea (1).wav'>阿練來泡茶02</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/ALen&Tea/20121104_ALen&Tea (2).wav'>阿練來泡茶03</a></td>
		<td><a href='./trs/GreenPeace/ALen&Tea/20121104_ALen&Tea (3).wav'>阿練來泡茶04</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/ALen&Tea/20121104_ALen&Tea (4).wav'>阿練來泡茶05</a></td>
		<td><a href='./trs/GreenPeace/ALen&Tea/20121104_ALen&Tea (5).wav'>阿練來泡茶06</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/ALen&Tea/20121104_ALen&Tea (6).wav'>阿練來泡茶07</a></td>
		<td><a href='./trs/GreenPeace/ALen&Tea/20121104_ALen&Tea (7).wav'>阿練來泡茶08</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (1).wav'>阿練來泡茶09</a></td>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (2).wav'>阿練來泡茶10</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (3).wav'>阿練來泡茶11</a></td>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (4).wav'>阿練來泡茶12</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (5).wav'>阿練來泡茶13</a></td>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (6).wav'>阿練來泡茶14</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (7).wav'>阿練來泡茶15</a></td>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (8).wav'>阿練來泡茶16</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (9).wav'>阿練來泡茶17</a></td>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (10).wav'>阿練來泡茶18</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (11).wav'>阿練來泡茶19</a></td>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (12).wav'>阿練來泡茶20</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (13).wav'>阿練來泡茶21</a></td>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (14).wav'>阿練來泡茶22</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (15).wav'>阿練來泡茶23</a></td>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (16).wav'>阿練來泡茶24</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (17).wav'>阿練來泡茶25</a></td>
		<td><a href='./trs/GreenPeace/ALen&Tea/20130526_ALen&Tea (18).wav'>阿練來泡茶26</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/ALen&Tea/20131020_ALen&Tea (1).wav'>阿練來泡茶27</a></td>
		<td><a href='./trs/GreenPeace/ALen&Tea/20131020_ALen&Tea (2).wav'>阿練來泡茶28</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/ALen&Tea/20131110_ALen&Tea.wavDACDec3_BICPnltySeg3.00_HACBICPnltyCl2.00 (1).wav'>阿練來泡茶29</a></td>
		<td><a href='./trs/GreenPeace/ALen&Tea/20131110_ALen&Tea.wavDACDec3_BICPnltySeg3.00_HACBICPnltyCl2.00 (2).wav'>阿練來泡茶30</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/ALen&Tea/20131110_ALen&Tea.wavDACDec3_BICPnltySeg3.00_HACBICPnltyCl2.00 (3).wav'>阿練來泡茶31</a></td>
		<td><a href='./trs/GreenPeace/ALen&Tea/20131110_ALen&Tea.wavDACDec3_BICPnltySeg3.00_HACBICPnltyCl2.00 (4).wav'>阿練來泡茶32</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/ALen&Tea/20131215_ALen&Tea.wav'>阿練來泡茶33</a></td>
		</TABLE>
		<hr>
		<h3>綠色和平 臺灣人俱樂部</h3>
		<table border=1>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130419TaiwaneseClub.wav'>臺灣人俱樂部01</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130420TaiwaneseClub.wav'>臺灣人俱樂部02</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130425TaiwaneseClub.wav'>臺灣人俱樂部03</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130426TaiwaneseClub.wav'>臺灣人俱樂部04</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130427TaiwaneseClub.wav'>臺灣人俱樂部05</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130429TaiwaneseClub.wav'>臺灣人俱樂部06</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130501TaiwaneseClub.wav'>臺灣人俱樂部07</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130504TaiwaneseClub.wav'>臺灣人俱樂部08</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130506TaiwaneseClub.wav'>臺灣人俱樂部09</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130508TaiwaneseClub.wav'>臺灣人俱樂部10</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130509TaiwaneseClub.wav'>臺灣人俱樂部11</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130510TaiwaneseClub.wav'>臺灣人俱樂部12</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130511TaiwaneseClub.wav'>臺灣人俱樂部13</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130513TaiwaneseClub.wav'>臺灣人俱樂部14</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130514TaiwaneseClub.wav'>臺灣人俱樂部15</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130516TaiwaneseClub.wav'>臺灣人俱樂部16</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130517TaiwaneseClub.wav'>臺灣人俱樂部17</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130518TaiwaneseClub.wav'>臺灣人俱樂部18</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130520TaiwaneseClub.wav'>臺灣人俱樂部19</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130521TaiwaneseClub.wav'>臺灣人俱樂部20</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130522TaiwaneseClub.wav'>臺灣人俱樂部21</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130523TaiwaneseClub.wav'>臺灣人俱樂部22</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130524TaiwaneseClub.wav'>臺灣人俱樂部23</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130525TaiwaneseClub.wav'>臺灣人俱樂部24</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130527TaiwaneseClub.wav'>臺灣人俱樂部25</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130528TaiwaneseClub.wav'>臺灣人俱樂部26</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130529TaiwaneseClub.wav'>臺灣人俱樂部27</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130530TaiwaneseClub.wav'>臺灣人俱樂部28</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130531TaiwaneseClub.wav'>臺灣人俱樂部29</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130601TaiwaneseClub.wav'>臺灣人俱樂部30</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130605TaiwaneseClub.wav'>臺灣人俱樂部31</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130608TaiwaneseClub.wav'>臺灣人俱樂部32</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130611TaiwaneseClub.wav'>臺灣人俱樂部33</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130612TaiwaneseClub.wav'>臺灣人俱樂部34</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130613TaiwaneseClub.wav'>臺灣人俱樂部35</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130615TaiwaneseClub.wav'>臺灣人俱樂部36</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130617TaiwaneseClub.wav'>臺灣人俱樂部37</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130620TaiwaneseClub.wav'>臺灣人俱樂部38</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130621TaiwaneseClub.wav'>臺灣人俱樂部39</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130624TaiwaneseClub.wav'>臺灣人俱樂部40</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130625TaiwaneseClub.wav'>臺灣人俱樂部41</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130626TaiwaneseClub.wav'>臺灣人俱樂部42</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130701TaiwaneseClub.wav'>臺灣人俱樂部43</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130703TaiwaneseClub.wav'>臺灣人俱樂部44</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130704TaiwaneseClub.wav'>臺灣人俱樂部45</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130705TaiwaneseClub.wav'>臺灣人俱樂部46</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130706TaiwaneseClub.wav'>臺灣人俱樂部47</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130709TaiwaneseClub.wav'>臺灣人俱樂部48</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130710TaiwaneseClub.wav'>臺灣人俱樂部49</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130711TaiwaneseClub.wav'>臺灣人俱樂部50</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130712TaiwaneseClub.wav'>臺灣人俱樂部51</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130713TaiwaneseClub.wav'>臺灣人俱樂部52</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130715TaiwaneseClub.wav'>臺灣人俱樂部53</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130716TaiwaneseClub.wav'>臺灣人俱樂部54</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130717TaiwaneseClub.wav'>臺灣人俱樂部55</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130724TaiwaneseClub.wav'>臺灣人俱樂部56</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130725TaiwaneseClub.wav'>臺灣人俱樂部57</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130726TaiwaneseClub.wav'>臺灣人俱樂部58</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130727TaiwaneseClub.wav'>臺灣人俱樂部59</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130729TaiwaneseClub.wav'>臺灣人俱樂部60</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130730TaiwaneseClub.wav'>臺灣人俱樂部61</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130731TaiwaneseClub.wav'>臺灣人俱樂部62</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130801TaiwaneseClub.wav'>臺灣人俱樂部63</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130802TaiwaneseClub.wav'>臺灣人俱樂部64</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130803TaiwaneseClub.wav'>臺灣人俱樂部65</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130805TaiwaneseClub.wav'>臺灣人俱樂部66</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130807TaiwaneseClub.wav'>臺灣人俱樂部67</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130808TaiwaneseClub.wav'>臺灣人俱樂部68</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130815TaiwaneseClub.wav'>臺灣人俱樂部69</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130816TaiwaneseClub.wav'>臺灣人俱樂部70</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130819TaiwaneseClub.wav'>臺灣人俱樂部71</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130820TaiwaneseClub.wav'>臺灣人俱樂部72</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130821TaiwaneseClub.wav'>臺灣人俱樂部73</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130822TaiwaneseClub.wav'>臺灣人俱樂部74</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130823TaiwaneseClub.wav'>臺灣人俱樂部75</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130824TaiwaneseClub.wav'>臺灣人俱樂部76</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130826TaiwaneseClub.wav'>臺灣人俱樂部77</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130827TaiwaneseClub.wav'>臺灣人俱樂部78</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130828TaiwaneseClub.wav'>臺灣人俱樂部79</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130829TaiwaneseClub.wav'>臺灣人俱樂部80</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130830TaiwaneseClub.wav'>臺灣人俱樂部81</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130831TaiwaneseClub.wav'>臺灣人俱樂部82</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130902TaiwaneseClub.wav'>臺灣人俱樂部83</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130903TaiwaneseClub.wav'>臺灣人俱樂部84</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130904TaiwaneseClub.wav'>臺灣人俱樂部85</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130905TaiwaneseClub.wav'>臺灣人俱樂部86</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130906TaiwaneseClub.wav'>臺灣人俱樂部87</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130907TaiwaneseClub.wav'>臺灣人俱樂部88</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130909TaiwaneseClub.wav'>臺灣人俱樂部89</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130910TaiwaneseClub.wav'>臺灣人俱樂部90</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130911TaiwaneseClub.wav'>臺灣人俱樂部91</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130912TaiwaneseClub.wav'>臺灣人俱樂部92</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130913TaiwaneseClub.wav'>臺灣人俱樂部93</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130914TaiwaneseClub.wav'>臺灣人俱樂部94</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130916TaiwaneseClub.wav'>臺灣人俱樂部95</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130917TaiwaneseClub.wav'>臺灣人俱樂部96</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130918TaiwaneseClub.wav'>臺灣人俱樂部97</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130919TaiwaneseClub.wav'>臺灣人俱樂部98</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130921TaiwaneseClub.wav'>臺灣人俱樂部99</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130923TaiwaneseClub.wav'>臺灣人俱樂部100</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130924TaiwaneseClub.wav'>臺灣人俱樂部101</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130925TaiwaneseClub.wav'>臺灣人俱樂部102</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130927TaiwaneseClub.wav'>臺灣人俱樂部103</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130928TaiwaneseClub.wav'>臺灣人俱樂部104</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20130930TaiwaneseClub.wav'>臺灣人俱樂部105</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131001TaiwaneseClub.wav'>臺灣人俱樂部106</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131002TaiwaneseClub.wav'>臺灣人俱樂部107</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131003TaiwaneseClub.wav'>臺灣人俱樂部108</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131004TaiwaneseClub.wav'>臺灣人俱樂部109</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131005TaiwaneseClub.wav'>臺灣人俱樂部110</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131007TaiwaneseClub.wav'>臺灣人俱樂部111</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131008TaiwaneseClub.wav'>臺灣人俱樂部112</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131010TaiwaneseClub.wav'>臺灣人俱樂部113</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131011TaiwaneseClub.wav'>臺灣人俱樂部114</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131012TaiwaneseClub.wav'>臺灣人俱樂部115</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131014TaiwaneseClub.wav'>臺灣人俱樂部116</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131015TaiwaneseClub.wav'>臺灣人俱樂部117</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131016TaiwaneseClub.wav'>臺灣人俱樂部118</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131017TaiwaneseClub.wav'>臺灣人俱樂部119</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131018TaiwaneseClub.wav'>臺灣人俱樂部120</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131019TaiwaneseClub.wav'>臺灣人俱樂部121</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131021TaiwaneseClub.wav'>臺灣人俱樂部122</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131022TaiwaneseClub.wav'>臺灣人俱樂部123</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131024TaiwaneseClub.wav'>臺灣人俱樂部124</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131025TaiwaneseClub.wav'>臺灣人俱樂部125</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131026TaiwaneseClub.wav'>臺灣人俱樂部126</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131028TaiwaneseClub.wav'>臺灣人俱樂部127</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131029TaiwaneseClub.wav'>臺灣人俱樂部128</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131031TaiwaneseClub.wav'>臺灣人俱樂部129</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131104TaiwaneseClub.wav'>臺灣人俱樂部130</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131105TaiwaneseClub.wav'>臺灣人俱樂部131</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131107TaiwaneseClub.wav'>臺灣人俱樂部132</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131108TaiwaneseClub.wav'>臺灣人俱樂部133</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131109TaiwaneseClub.wav'>臺灣人俱樂部134</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131111TaiwaneseClub.wav'>臺灣人俱樂部135</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131112TaiwaneseClub.wav'>臺灣人俱樂部136</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131113TaiwaneseClub.wav'>臺灣人俱樂部137</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131115TaiwaneseClub.wav'>臺灣人俱樂部138</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131116TaiwaneseClub.wav'>臺灣人俱樂部139</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131119TaiwaneseClub.wav'>臺灣人俱樂部140</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131121TaiwaneseClub.wav'>臺灣人俱樂部141</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131122TaiwaneseClub.wav'>臺灣人俱樂部142</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131123TaiwaneseClub.wav'>臺灣人俱樂部143</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131125TaiwaneseClub.wav'>臺灣人俱樂部144</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131127TaiwaneseClub.wav'>臺灣人俱樂部145</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131128TaiwaneseClub.wav'>臺灣人俱樂部146</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131129TaiwaneseClub.wav'>臺灣人俱樂部147</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131130TaiwaneseClub.wav'>臺灣人俱樂部148</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131202TaiwaneseClub.wav'>臺灣人俱樂部149</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131203TaiwaneseClub.wav'>臺灣人俱樂部150</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131204TaiwaneseClub.wav'>臺灣人俱樂部151</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131205TaiwaneseClub.wav'>臺灣人俱樂部152</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131206TaiwaneseClub.wav'>臺灣人俱樂部153</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131207TaiwaneseClub.wav'>臺灣人俱樂部154</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131209TaiwaneseClub.wav'>臺灣人俱樂部155</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131214TaiwaneseClub.wav'>臺灣人俱樂部156</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131216TaiwaneseClub.wav'>臺灣人俱樂部157</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131218TaiwaneseClub.wav'>臺灣人俱樂部158</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131219TaiwaneseClub.wav'>臺灣人俱樂部159</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20131220TaiwaneseClub.wav'>臺灣人俱樂部160</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20140113TaiwaneseClub.wav'>臺灣人俱樂部161</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20140114TaiwaneseClub.wav'>臺灣人俱樂部162</a></td>
		<tr>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/20140115TaiwaneseClub.wav'>臺灣人俱樂部163</a></td>
		<td><a href='./trs/GreenPeace/TaiwaneseClub/Untitled (561).wav'>臺灣人俱樂部164</a></td>
		</TABLE>
		<hr>
		</table border=1>
		<hr>
	</center>








</body>
</html>