<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="../js/raphael.js"></script>
<script type="text/javascript" src="../js/morris.js"></script>
<link rel="stylesheet" href="../js/morris.css">
<style type="text/css"> 
pre {
  height: 300px;
  overflow: auto;
}
</style> 
<?php
if(@$_POST["submit"]=="篩選"){
	$keys = $_POST ["item1"].$_POST["item2"];
	$times= $_POST["item3"];
	$aCommand= 'c:/Python33/python.exe C:/AppServ/www/download_page/syllable.py '.$times.' - '.$keys;
	$aReturn= system($aCommand);
	echo $aCommand.'<br>';
	echo $aReturn;
	header('Location: http://140.109.18.117/download_page/syltest-0.php');
    exit;
	}
?>
<form method="post" name="myform">
		篩選<br>韻母:
		<select size="1" name="item1" id="sysearch">
			<option value="all">-All-</option>
			<option value="all">-單韻母-</option>
			<option value="a">a</option>
			<option value="i">i</option>
			<option value="u">u</option>
			<option value="e">e</option>
			<option value="or">or</option>
			<option value="o">o</option>
			<option value="all">-複韻母-</option>
			<option value="ai">ai</option>
			<option value="au">au</option>
			<option value="ia">ia</option>
			<option value="iu">iu</option>
			<option value="io">io</option>
			<option value="iau">iau</option>
			<option value="oa">oa</option>
			<option value="oi">oi</option>
			<option value="oe">oe</option>
			<option value="oai">oai</option>
			<option value="ua">ua</option>
			<option value="ui">ui</option>
			<option value="ue">ue</option>
			<option value="uai">uai</option>
		</select>
		<select size="1" name="item2" id="sysearch">
			<option value="">無</option>
			<option value="p">-p</option>
			<option value="t">-t</option>
			<option value="k">-k</option>
			<option value="h">-h</option>
		</select>
		<select size="1" name="item3" id="sysearch">
			<option value="all">all</option>
			<option value="10">10</option>
			<option value="50">50</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
		</select>
		<input name="submit" type="submit" value="篩選"><br>
		<div id="Bar"></div>
		
	</form>
<body>
	<script type="text/javascript">
	$(function(){
		var data =[
			{"syllable": " a2 ","number": 343 },
			{"syllable": " li1 ","number": 268 },
			{"syllable": " la3 ","number": 260 },
			{"syllable": " qua1 ","number": 217 },
			{"syllable": " e3 ","number": 201 },
			{"syllable": " si3 ","number": 188 },
			{"syllable": " a3 ","number": 182 },
			{"syllable": " honnh2 ","number": 160 },
			{"syllable": " hor4 ","number": 148 },
			{"syllable": " e2 ","number": 136 },
			{"syllable": " ah1 ","number": 119 },
			{"syllable": " vu4 ","number": 117 },
			{"syllable": " oh2 ","number": 100 },
			{"syllable": " m3 ","number": 91 },
			{"syllable": " zit3 ","number": 88 },
			{"syllable": " gorh1 ","number": 86 },
			{"syllable": " lai5 ","number": 85 },
			{"syllable": " dor3 ","number": 85 },
			{"syllable": " a1 ","number": 83 },
			{"syllable": " vor2 ","number": 80 },
			{"syllable": " u3 ","number": 80 },
			{"syllable": " an1 ","number": 80 },
			{"syllable": " i2 ","number": 70 },
			{"syllable": " lai2 ","number": 62 },
			{"syllable": " ai4 ","number": 61 },
			{"syllable": " veh1 ","number": 60 },
			{"syllable": " ziah1 ","number": 59 },
			{"syllable": " ve3 ","number": 59 },
			{"syllable": " ma3 ","number": 58 },
			{"syllable": " gong1 ","number": 56 },
			{"syllable": " ne1 ","number": 54 },
			{"syllable": " long1 ","number": 53 },
			{"syllable": " ziok1 ","number": 52 },
			{"syllable": " lin1 ","number": 52 },
			{"syllable": " zit1 ","number": 50 },
			{"syllable": " oh3 ","number": 50 },
			{"syllable": " neh2 ","number": 50 },
			{"syllable": " ki3 ","number": 50 },
			{"syllable": " ga3 ","number": 47 },
			{"syllable": " kuann4 ","number": 46 },
			{"syllable": " ki1 ","number": 46 },
			{"syllable": " ziah3 ","number": 45 },
			{"syllable": " hor1 ","number": 45 },
			{"syllable": " bah2 ","number": 45 },
			{"syllable": " ze1 ","number": 42 },
			{"syllable": " gah1 ","number": 42 },
			{"syllable": " kah1 ","number": 41 },
			{"syllable": " lan1 ","number": 39 },
			{"syllable": " gong4 ","number": 39 },
			{"syllable": " zor4 ","number": 38 },
			{"syllable": " na3 ","number": 38 },
			{"syllable": " zi4 ","number": 37 },
			{"syllable": " zinn5 ","number": 36 },
			{"syllable": " e1 ","number": 36 },
			{"syllable": " mai4 ","number": 35 },
			{"syllable": " vor3 ","number": 34 },
			{"syllable": " ho3 ","number": 34 },
			{"syllable": " zai2 ","number": 33 },
			{"syllable": " na4 ","number": 33 },
			{"syllable": " siunn3 ","number": 32 },
			{"syllable": " sing2 ","number": 31 },
			{"syllable": " li3 ","number": 30 },
			{"syllable": " a4 ","number": 30 },
			{"syllable": " ziah2 ","number": 28 },
			{"syllable": " di3 ","number": 28 },
			{"syllable": " dai3 ","number": 28 },
			{"syllable": " lai3 ","number": 27 },
			{"syllable": " zing3 ","number": 26 },
			{"syllable": " lang5 ","number": 26 },
			{"syllable": " hui2 ","number": 26 },
			{"syllable": " ga2 ","number": 26 },
			{"syllable": " dor2 ","number": 26 },
			{"syllable": " zi3 ","number": 25 },
			{"syllable": " he1 ","number": 25 },
			{"syllable": " dior3 ","number": 25 },
			{"syllable": " zin2 ","number": 24 },
			{"syllable": " sui4 ","number": 24 },
			{"syllable": " li4 ","number": 24 },
			{"syllable": " gam1 ","number": 24 },
			{"syllable": " eh2 ","number": 24 },
			{"syllable": " dang4 ","number": 24 },
			{"syllable": " zia1 ","number": 23 },
			{"syllable": " leh1 ","number": 23 },
			{"syllable": " kuann3 ","number": 23 },
			{"syllable": " ge1 ","number": 23 },
			{"syllable": " diorh2 ","number": 23 },
			{"syllable": " dau4 ","number": 23 },
			{"syllable": " si2 ","number": 22 },
			{"syllable": " hok2 ","number": 22 },
			{"syllable": " dua3 ","number": 22 },
			{"syllable": " siann1 ","number": 21 },
			{"syllable": " ma4 ","number": 21 },
			{"syllable": " le2 ","number": 21 },
			{"syllable": " it1 ","number": 21 },
			{"syllable": " ge2 ","number": 21 },
			{"syllable": " ah2 ","number": 21 },
			{"syllable": " len5 ","number": 20 },
			{"syllable": " lang2 ","number": 20 },
			{"syllable": " huat1 ","number": 20 },
			{"syllable": " ge3 ","number": 20 },
			{"syllable": " sim1 ","number": 19 },
			{"syllable": " na1 ","number": 19 },
			{"syllable": " mih1 ","number": 19 },
			{"syllable": " gin4 ","number": 19 },
			{"syllable": " gang2 ","number": 19 },
			{"syllable": " cai3 ","number": 19 },
			{"syllable": " ziann2 ","number": 18 },
			{"syllable": " ze2 ","number": 18 },
			{"syllable": " vor5 ","number": 18 },
			{"syllable": " qua3 ","number": 18 },
			{"syllable": " i1 ","number": 18 },
			{"syllable": " diorh3 ","number": 18 },
			{"syllable": " tiam2 ","number": 17 },
			{"syllable": " qin1 ","number": 17 },
			{"syllable": " huann2 ","number": 17 },
			{"syllable": " ho2 ","number": 17 },
			{"syllable": " gor1 ","number": 17 },
			{"syllable": " dang2 ","number": 17 },
			{"syllable": " zu4 ","number": 16 },
			{"syllable": " zin1 ","number": 16 },
			{"syllable": " vi1 ","number": 16 },
			{"syllable": " ui3 ","number": 16 },
			{"syllable": " u2 ","number": 16 },
			{"syllable": " tau2 ","number": 16 },
			{"syllable": " sit3 ","number": 16 },
			{"syllable": " siong3 ","number": 16 },
			{"syllable": " se4 ","number": 16 },
			{"syllable": " qo3 ","number": 16 },
			{"syllable": " o3 ","number": 16 },
			{"syllable": " mai2 ","number": 16 },
			{"syllable": " lu1 ","number": 16 },
			{"syllable": " liau4 ","number": 16 },
			{"syllable": " ko1 ","number": 16 },
			{"syllable": " hannh2 ","number": 16 },
			{"syllable": " han3 ","number": 16 },
			{"syllable": " gue4 ","number": 16 },
			{"syllable": " dan4 ","number": 16 },
			{"syllable": " ue2 ","number": 15 },
			{"syllable": " so4 ","number": 15 },
			{"syllable": " mh2 ","number": 15 },
			{"syllable": " hi4 ","number": 15 },
			{"syllable": " gin1 ","number": 15 },
			{"syllable": " dui4 ","number": 15 },
			{"syllable": " dng4 ","number": 15 },
			{"syllable": " dak3 ","number": 15 },
			{"syllable": " sin2 ","number": 14 },
			{"syllable": " sann2 ","number": 14 },
			{"syllable": " de3 ","number": 14 },
			{"syllable": " zor3 ","number": 13 },
			{"syllable": " zai1 ","number": 13 },
			{"syllable": " ven1 ","number": 13 },
			{"syllable": " vai4 ","number": 13 },
			{"syllable": " tau5 ","number": 13 },
			{"syllable": " sun3 ","number": 13 },
			{"syllable": " ri2 ","number": 13 },
			{"syllable": " qun1 ","number": 13 },
			{"syllable": " o2 ","number": 13 },
			{"syllable": " lor4 ","number": 13 },
			{"syllable": " leh3 ","number": 13 },
			{"syllable": " iorh3 ","number": 13 },
			{"syllable": " iau4 ","number": 13 },
			{"syllable": " i4 ","number": 13 },
			{"syllable": " gior4 ","number": 13 },
			{"syllable": " giann5 ","number": 13 },
			{"syllable": " bau2 ","number": 13 },
			{"syllable": " sen2 ","number": 12 },
			{"syllable": " nai4 ","number": 12 },
			{"syllable": " hi2 ","number": 12 },
			{"syllable": " gin2 ","number": 12 },
			{"syllable": " gi2 ","number": 12 },
			{"syllable": " cu3 ","number": 12 },
			{"syllable": " bng2 ","number": 12 },
			{"syllable": " ban1 ","number": 12 },
			{"syllable": " zu1 ","number": 11 },
			{"syllable": " zok1 ","number": 11 },
			{"syllable": " vang3 ","number": 11 },
			{"syllable": " sior1 ","number": 11 },
			{"syllable": " siong4 ","number": 11 },
			{"syllable": " qua2 ","number": 11 },
			{"syllable": " mui2 ","number": 11 },
			{"syllable": " in2 ","number": 11 },
			{"syllable": " iann1 ","number": 11 },
			{"syllable": " guai1 ","number": 11 },
			{"syllable": " giann4 ","number": 11 },
			{"syllable": " ge4 ","number": 11 },
			{"syllable": " e5 ","number": 11 },
			{"syllable": " ding3 ","number": 11 },
			{"syllable": " cin1 ","number": 11 },
			{"syllable": " zuann4 ","number": 10 },
			{"syllable": " zu3 ","number": 10 },
			{"syllable": " sinn1 ","number": 10 },
			{"syllable": " liau1 ","number": 10 },
			{"syllable": " li2 ","number": 10 },
			{"syllable": " le3 ","number": 10 },
			{"syllable": " kuai4 ","number": 10 },
			{"syllable": " ko4 ","number": 10 },
			{"syllable": " ing5 ","number": 10 },
			{"syllable": " iau1 ","number": 10 },
			{"syllable": " iah1 ","number": 10 },
			{"syllable": " i3 ","number": 10 },
			{"syllable": " hit1 ","number": 10 },
			{"syllable": " ging2 ","number": 10 },
			{"syllable": " giann2 ","number": 10 },
			{"syllable": " gau3 ","number": 10 },
			{"syllable": " gang1 ","number": 10 },
			{"syllable": " dinn1 ","number": 10 },
			{"syllable": " cut1 ","number": 10 },
			{"syllable": " cu4 ","number": 10 },
			{"syllable": " zun2 ","number": 9 },
			{"syllable": " ve2 ","number": 9 },
			{"syllable": " ve1 ","number": 9 },
			{"syllable": " su2 ","number": 9 },
			{"syllable": " sim2 ","number": 9 },
			{"syllable": " sia2 ","number": 9 },
			{"syllable": " sia1 ","number": 9 },
			{"syllable": " quan2 ","number": 9 },
			{"syllable": " ni5 ","number": 9 },
			{"syllable": " na2 ","number": 9 },
			{"syllable": " kor1 ","number": 9 },
			{"syllable": " iann4 ","number": 9 },
			{"syllable": " ha3 ","number": 9 },
			{"syllable": " gong2 ","number": 9 },
			{"syllable": " gau4 ","number": 9 },
			{"syllable": " ga4 ","number": 9 },
			{"syllable": " cun2 ","number": 9 },
			{"syllable": " ciann1 ","number": 9 },
			{"syllable": " zui1 ","number": 8 },
			{"syllable": " ze3 ","number": 8 },
			{"syllable": " zau4 ","number": 8 },
			{"syllable": " za2 ","number": 8 },
			{"syllable": " ui2 ","number": 8 },
			{"syllable": " tiann2 ","number": 8 },
			{"syllable": " te4 ","number": 8 },
			{"syllable": " tan4 ","number": 8 },
			{"syllable": " siunn2 ","number": 8 },
			{"syllable": " si5 ","number": 8 },
			{"syllable": " si4 ","number": 8 },
			{"syllable": " se3 ","number": 8 },
			{"syllable": " lin2 ","number": 8 },
			{"syllable": " lau2 ","number": 8 },
			{"syllable": " la2 ","number": 8 },
			{"syllable": " ing4 ","number": 8 },
			{"syllable": " hun2 ","number": 8 },
			{"syllable": " hue3 ","number": 8 },
			{"syllable": " huan2 ","number": 8 },
			{"syllable": " hong4 ","number": 8 },
			{"syllable": " gang3 ","number": 8 },
			{"syllable": " gan2 ","number": 8 },
			{"syllable": " gak1 ","number": 8 },
			{"syllable": " gai4 ","number": 8 },
			{"syllable": " dong2 ","number": 8 },
			{"syllable": " dan1 ","number": 8 },
			{"syllable": " cai4 ","number": 8 },
			{"syllable": " beh2 ","number": 8 },
			{"syllable": " aih2 ","number": 8 },
			{"syllable": " zing5 ","number": 7 },
			{"syllable": " ziann4 ","number": 7 },
			{"syllable": " zap3 ","number": 7 },
			{"syllable": " so1 ","number": 7 },
			{"syllable": " siu1 ","number": 7 },
			{"syllable": " sit2 ","number": 7 },
			{"syllable": " siong1 ","number": 7 },
			{"syllable": " sin1 ","number": 7 },
			{"syllable": " siannh2 ","number": 7 },
			{"syllable": " o1 ","number": 7 },
			{"syllable": " kuan4 ","number": 7 },
			{"syllable": " kor3 ","number": 7 },
			{"syllable": " iong3 ","number": 7 },
			{"syllable": " ing2 ","number": 7 },
			{"syllable": " huat2 ","number": 7 },
			{"syllable": " hia1 ","number": 7 },
			{"syllable": " hak3 ","number": 7 },
			{"syllable": " guai2 ","number": 7 },
			{"syllable": " ging1 ","number": 7 },
			{"syllable": " ga5 ","number": 7 },
			{"syllable": " dor4 ","number": 7 },
			{"syllable": " dit3 ","number": 7 },
			{"syllable": " de4 ","number": 7 },
			{"syllable": " da4 ","number": 7 },
			{"syllable": " cun1 ","number": 7 },
			{"syllable": " cing2 ","number": 7 },
			{"syllable": " bai4 ","number": 7 },
			{"syllable": " ang2 ","number": 7 },
			{"syllable": " ziong2 ","number": 6 },
			{"syllable": " za4 ","number": 6 },
			{"syllable": " vin2 ","number": 6 },
			{"syllable": " uah2 ","number": 6 },
			{"syllable": " te3 ","number": 6 },
			{"syllable": " su1 ","number": 6 },
			{"syllable": " sit1 ","number": 6 },
			{"syllable": " painn1 ","number": 6 },
			{"syllable": " or2 ","number": 6 },
			{"syllable": " nng3 ","number": 6 },
			{"syllable": " ni3 ","number": 6 },
			{"syllable": " ni2 ","number": 6 },
			{"syllable": " mih3 ","number": 6 },
			{"syllable": " len2 ","number": 6 },
			{"syllable": " lau3 ","number": 6 },
			{"syllable": " kue3 ","number": 6 },
			{"syllable": " kor4 ","number": 6 },
			{"syllable": " kng4 ","number": 6 },
			{"syllable": " kau3 ","number": 6 },
			{"syllable": " kang2 ","number": 6 },
			{"syllable": " hue1 ","number": 6 },
			{"syllable": " hang2 ","number": 6 },
			{"syllable": " hai2 ","number": 6 },
			{"syllable": " gue3 ","number": 6 },
			{"syllable": " guan3 ","number": 6 },
			{"syllable": " guan2 ","number": 6 },
			{"syllable": " gu4 ","number": 6 },
			{"syllable": " ging4 ","number": 6 },
			{"syllable": " gi3 ","number": 6 },
			{"syllable": " gai2 ","number": 6 },
			{"syllable": " du1 ","number": 6 },
			{"syllable": " dor1 ","number": 6 },
			{"syllable": " do2 ","number": 6 },
			{"syllable": " cue3 ","number": 6 },
			{"syllable": " binn1 ","number": 6 },
			{"syllable": " bi1 ","number": 6 },
			{"syllable": " ban3 ","number": 6 },
			{"syllable": " ba4 ","number": 6 },
			{"syllable": " au2 ","number": 6 },
			{"syllable": " zui4 ","number": 5 },
			{"syllable": " zik2 ","number": 5 },
			{"syllable": " zi1 ","number": 5 },
			{"syllable": " za1 ","number": 5 },
			{"syllable": " vue3 ","number": 5 },
			{"syllable": " vuai5 ","number": 5 },
			{"syllable": " vo3 ","number": 5 },
			{"syllable": " uann3 ","number": 5 },
			{"syllable": " tiann3 ","number": 5 },
			{"syllable": " tiam1 ","number": 5 },
			{"syllable": " siu2 ","number": 5 },
			{"syllable": " sin4 ","number": 5 },
			{"syllable": " sia4 ","number": 5 },
			{"syllable": " ri3 ","number": 5 },
			{"syllable": " quat3 ","number": 5 },
			{"syllable": " pen2 ","number": 5 },
			{"syllable": " pa4 ","number": 5 },
			{"syllable": " orh1 ","number": 5 },
			{"syllable": " nua4 ","number": 5 },
			{"syllable": " me2 ","number": 5 },
			{"syllable": " lo5 ","number": 5 },
			{"syllable": " le1 ","number": 5 },
			{"syllable": " kun3 ","number": 5 },
			{"syllable": " kui2 ","number": 5 },
			{"syllable": " king1 ","number": 5 },
			{"syllable": " kai4 ","number": 5 },
			{"syllable": " iau3 ","number": 5 },
			{"syllable": " i5 ","number": 5 },
			{"syllable": " hun4 ","number": 5 },
			{"syllable": " hue2 ","number": 5 },
			{"syllable": " hior4 ","number": 5 },
			{"syllable": " gui1 ","number": 5 },
			{"syllable": " go4 ","number": 5 },
			{"syllable": " gi4 ","number": 5 },
			{"syllable": " gan1 ","number": 5 },
			{"syllable": " eh3 ","number": 5 },
			{"syllable": " dng3 ","number": 5 },
			{"syllable": " dng2 ","number": 5 },
			{"syllable": " dng1 ","number": 5 },
			{"syllable": " ding4 ","number": 5 },
			{"syllable": " diam1 ","number": 5 },
			{"syllable": " de5 ","number": 5 },
			{"syllable": " de2 ","number": 5 },
			{"syllable": " dau1 ","number": 5 },
			{"syllable": " dann1 ","number": 5 },
			{"syllable": " cui3 ","number": 5 },
			{"syllable": " cinn1 ","number": 5 },
			{"syllable": " ceh2 ","number": 5 },
			{"syllable": " can2 ","number": 5 },
			{"syllable": " but1 ","number": 5 },
			{"syllable": " bin1 ","number": 5 },
			{"syllable": " benn2 ","number": 5 },
			{"syllable": " bau1 ","number": 5 },
			{"syllable": " bang4 ","number": 5 },
			{"syllable": " bak1 ","number": 5 },
			{"syllable": " zin4 ","number": 4 },
			{"syllable": " zia4 ","number": 4 },
			{"syllable": " zau5 ","number": 4 },
			{"syllable": " vi2 ","number": 4 },
			{"syllable": " ven4 ","number": 4 },
			{"syllable": " van3 ","number": 4 },
			{"syllable": " ui4 ","number": 4 },
			{"syllable": " tiau2 ","number": 4 },
			{"syllable": " tiann1 ","number": 4 },
			{"syllable": " tang2 ","number": 4 },
			{"syllable": " sui2 ","number": 4 },
			{"syllable": " su3 ","number": 4 },
			{"syllable": " sai3 ","number": 4 },
			{"syllable": " quan1 ","number": 4 },
			{"syllable": " qua4 ","number": 4 },
			{"syllable": " mng2 ","number": 4 },
			{"syllable": " me5 ","number": 4 },
			{"syllable": " lit2 ","number": 4 },
			{"syllable": " lip2 ","number": 4 },
			{"syllable": " lin3 ","number": 4 },
			{"syllable": " lik2 ","number": 4 },
			{"syllable": " liap2 ","number": 4 },
			{"syllable": " lang3 ","number": 4 },
			{"syllable": " kui1 ","number": 4 },
			{"syllable": " koh2 ","number": 4 },
			{"syllable": " kng3 ","number": 4 },
			{"syllable": " kau4 ","number": 4 },
			{"syllable": " ka1 ","number": 4 },
			{"syllable": " ior1 ","number": 4 },
			{"syllable": " iong2 ","number": 4 },
			{"syllable": " in1 ","number": 4 },
			{"syllable": " hui3 ","number": 4 },
			{"syllable": " hue4 ","number": 4 },
			{"syllable": " huan5 ","number": 4 },
			{"syllable": " hi1 ","number": 4 },
			{"syllable": " hau3 ","number": 4 },
			{"syllable": " hau2 ","number": 4 },
			{"syllable": " ha1 ","number": 4 },
			{"syllable": " gui2 ","number": 4 },
			{"syllable": " guai4 ","number": 4 },
			{"syllable": " gua3 ","number": 4 },
			{"syllable": " gua1 ","number": 4 },
			{"syllable": " gor4 ","number": 4 },
			{"syllable": " giong2 ","number": 4 },
			{"syllable": " ging3 ","number": 4 },
			{"syllable": " gau1 ","number": 4 },
			{"syllable": " dong3 ","number": 4 },
			{"syllable": " do4 ","number": 4 },
			{"syllable": " diong3 ","number": 4 },
			{"syllable": " ding1 ","number": 4 },
			{"syllable": " diau5 ","number": 4 },
			{"syllable": " diann3 ","number": 4 },
			{"syllable": " diam4 ","number": 4 },
			{"syllable": " dam2 ","number": 4 },
			{"syllable": " cue2 ","number": 4 },
			{"syllable": " ciunn3 ","number": 4 },
			{"syllable": " ciu4 ","number": 4 },
			{"syllable": " ce2 ","number": 4 },
			{"syllable": " ca2 ","number": 4 },
			{"syllable": " buann2 ","number": 4 },
			{"syllable": " bo2 ","number": 4 },
			{"syllable": " bat1 ","number": 4 },
			{"syllable": " bai3 ","number": 4 },
			{"syllable": " am4 ","number": 4 },
			{"syllable": " ai3 ","number": 4 },
			{"syllable": " zior4 ","number": 3 },
			{"syllable": " zin3 ","number": 3 },
			{"syllable": " zim4 ","number": 3 },
			{"syllable": " vok3 ","number": 3 },
			{"syllable": " vo4 ","number": 3 },
			{"syllable": " vo1 ","number": 3 },
			{"syllable": " ving2 ","number": 3 },
			{"syllable": " vi3 ","number": 3 },
			{"syllable": " ve4 ","number": 3 },
			{"syllable": " vat2 ","number": 3 },
			{"syllable": " vat1 ","number": 3 },
			{"syllable": " van2 ","number": 3 },
			{"syllable": " un3 ","number": 3 },
			{"syllable": " tua2 ","number": 3 },
			{"syllable": " tok2 ","number": 3 },
			{"syllable": " tng5 ","number": 3 },
			{"syllable": " tinn2 ","number": 3 },
			{"syllable": " tak3 ","number": 3 },
			{"syllable": " sng4 ","number": 3 },
			{"syllable": " sng3 ","number": 3 },
			{"syllable": " siong2 ","number": 3 },
			{"syllable": " sing1 ","number": 3 },
			{"syllable": " siau4 ","number": 3 },
			{"syllable": " sia3 ","number": 3 },
			{"syllable": " senn2 ","number": 3 },
			{"syllable": " senn1 ","number": 3 },
			{"syllable": " sannh2 ","number": 3 },
			{"syllable": " sann1 ","number": 3 },
			{"syllable": " ren5 ","number": 3 },
			{"syllable": " qo2 ","number": 3 },
			{"syllable": " qau5 ","number": 3 },
			{"syllable": " pang2 ","number": 3 },
			{"syllable": " pai1 ","number": 3 },
			{"syllable": " orh3 ","number": 3 },
			{"syllable": " oh1 ","number": 3 },
			{"syllable": " mi4 ","number": 3 },
			{"syllable": " ma2 ","number": 3 },
			{"syllable": " lor3 ","number": 3 },
			{"syllable": " lo2 ","number": 3 },
			{"syllable": " lit3 ","number": 3 },
			{"syllable": " lim2 ","number": 3 },
			{"syllable": " lim1 ","number": 3 },
			{"syllable": " liam2 ","number": 3 },
			{"syllable": " lia1 ","number": 3 },
			{"syllable": " li ","number": 3 },
			{"syllable": " leh2 ","number": 3 },
			{"syllable": " lau1 ","number": 3 },
			{"syllable": " lan5 ","number": 3 },
			{"syllable": " laih2 ","number": 3 },
			{"syllable": " kun4 ","number": 3 },
			{"syllable": " kit3 ","number": 3 },
			{"syllable": " kit2 ","number": 3 },
			{"syllable": " kin2 ","number": 3 },
			{"syllable": " kiai3 ","number": 3 },
			{"syllable": " kai2 ","number": 3 },
			{"syllable": " ka2 ","number": 3 },
			{"syllable": " iu5 ","number": 3 },
			{"syllable": " iu2 ","number": 3 },
			{"syllable": " iu1 ","number": 3 },
			{"syllable": " iorh2 ","number": 3 },
			{"syllable": " hun1 ","number": 3 },
			{"syllable": " hua5 ","number": 3 },
			{"syllable": " hua4 ","number": 3 },
			{"syllable": " honnh3 ","number": 3 },
			{"syllable": " hioh2 ","number": 3 },
			{"syllable": " hing5 ","number": 3 },
			{"syllable": " hing4 ","number": 3 },
			{"syllable": " hiau1 ","number": 3 },
			{"syllable": " hang3 ","number": 3 },
			{"syllable": " guan5 ","number": 3 },
			{"syllable": " guan1 ","number": 3 },
			{"syllable": " gior3 ","number": 3 },
			{"syllable": " gau2 ","number": 3 },
			{"syllable": " gann1 ","number": 3 },
			{"syllable": " gam4 ","number": 3 },
			{"syllable": " gai1 ","number": 3 },
			{"syllable": " eh1 ","number": 3 },
			{"syllable": " dorh2 ","number": 3 },
			{"syllable": " diong1 ","number": 3 },
			{"syllable": " dinn2 ","number": 3 },
			{"syllable": " ding2 ","number": 3 },
			{"syllable": " din2 ","number": 3 },
			{"syllable": " diau2 ","number": 3 },
			{"syllable": " di2 ","number": 3 },
			{"syllable": " dau3 ","number": 3 },
			{"syllable": " dam3 ","number": 3 },
			{"syllable": " dai2 ","number": 3 },
			{"syllable": " cut2 ","number": 3 },
			{"syllable": " cua3 ","number": 3 },
			{"syllable": " cor4 ","number": 3 },
			{"syllable": " ci2 ","number": 3 },
			{"syllable": " buat3 ","number": 3 },
			{"syllable": " bit2 ","number": 3 },
			{"syllable": " beh3 ","number": 3 },
			{"syllable": " bang2 ","number": 3 },
			{"syllable": " bai2 ","number": 3 },
			{"syllable": " au3 ","number": 3 },
			{"syllable": " an2 ","number": 3 },
			{"syllable": " am3 ","number": 3 },
			{"syllable": " ah3 ","number": 3 },
			{"syllable": " zun1 ","number": 2 },
			{"syllable": " zuat3 ","number": 2 },
			{"syllable": " zuan2 ","number": 2 },
			{"syllable": " zng1 ","number": 2 },
			{"syllable": " zit ","number": 2 },
			{"syllable": " ziong4 ","number": 2 },
			{"syllable": " ziong3 ","number": 2 },
			{"syllable": " zing4 ","number": 2 },
			{"syllable": " zing2 ","number": 2 },
			{"syllable": " zik1 ","number": 2 },
			{"syllable": " ze4 ","number": 2 },
			{"syllable": " zau2 ","number": 2 },
			{"syllable": " zam2 ","number": 2 },
			{"syllable": " zai3 ","number": 2 },
			{"syllable": " za5 ","number": 2 },
			{"syllable": " vun5 ","number": 2 },
			{"syllable": " vue2 ","number": 2 },
			{"syllable": " vong2 ","number": 2 },
			{"syllable": " vin3 ","number": 2 },
			{"syllable": " vat3 ","number": 2 },
			{"syllable": " vai3 ","number": 2 },
			{"syllable": " vai2 ","number": 2 },
			{"syllable": " un2 ","number": 2 },
			{"syllable": " un1 ","number": 2 },
			{"syllable": " tuan5 ","number": 2 },
			{"syllable": " tng1 ","number": 2 },
			{"syllable": " tinn1 ","number": 2 },
			{"syllable": " tiam4 ","number": 2 },
			{"syllable": " suah1 ","number": 2 },
			{"syllable": " sua1 ","number": 2 },
			{"syllable": " siunn1 ","number": 2 },
			{"syllable": " siorh2 ","number": 2 },
			{"syllable": " sior4 ","number": 2 },
			{"syllable": " sior2 ","number": 2 },
			{"syllable": " siok3 ","number": 2 },
			{"syllable": " sing4 ","number": 2 },
			{"syllable": " siann4 ","number": 2 },
			{"syllable": " siang2 ","number": 2 },
			{"syllable": " senn4 ","number": 2 },
			{"syllable": " sang3 ","number": 2 },
			{"syllable": " sang2 ","number": 2 },
			{"syllable": " sang1 ","number": 2 },
			{"syllable": " san4 ","number": 2 },
			{"syllable": " sai1 ","number": 2 },
			{"syllable": " rip3 ","number": 2 },
			{"syllable": " rin3 ","number": 2 },
			{"syllable": " queh2 ","number": 2 },
			{"syllable": " quan3 ","number": 2 },
			{"syllable": " qik2 ","number": 2 },
			{"syllable": " qiap2 ","number": 2 },
			{"syllable": " qi2 ","number": 2 },
			{"syllable": " pua4 ","number": 2 },
			{"syllable": " pen4 ","number": 2 },
			{"syllable": " oh5 ","number": 2 },
			{"syllable": " nua1 ","number": 2 },
			{"syllable": " nqo1 ","number": 2 },
			{"syllable": " niu3 ","number": 2 },
			{"syllable": " nia1 ","number": 2 },
			{"syllable": " ne2 ","number": 2 },
			{"syllable": " nai3 ","number": 2 },
			{"syllable": " mui3 ","number": 2 },
			{"syllable": " meh2 ","number": 2 },
			{"syllable": " me1 ","number": 2 },
			{"syllable": " mai3 ","number": 2 },
			{"syllable": " mah3 ","number": 2 },
			{"syllable": " ma1 ","number": 2 },
			{"syllable": " m5 ","number": 2 },
			{"syllable": " lun3 ","number": 2 },
			{"syllable": " lue3 ","number": 2 },
			{"syllable": " lok2 ","number": 2 },
			{"syllable": " lit1 ","number": 2 },
			{"syllable": " lip3 ","number": 2 },
			{"syllable": " liong2 ","number": 2 },
			{"syllable": " ling2 ","number": 2 },
			{"syllable": " lin4 ","number": 2 },
			{"syllable": " let2 ","number": 2 },
			{"syllable": " lap3 ","number": 2 },
			{"syllable": " lak3 ","number": 2 },
			{"syllable": " lak1 ","number": 2 },
			{"syllable": " ki4 ","number": 2 },
			{"syllable": " keh2 ","number": 2 },
			{"syllable": " kan2 ","number": 2 },
			{"syllable": " ior3 ","number": 2 },
			{"syllable": " iong1 ","number": 2 },
			{"syllable": " ing3 ","number": 2 },
			{"syllable": " ing1 ","number": 2 },
			{"syllable": " hue5 ","number": 2 },
			{"syllable": " hu4 ","number": 2 },
			{"syllable": " hu3 ","number": 2 },
			{"syllable": " hong1 ","number": 2 },
			{"syllable": " hoh3 ","number": 2 },
			{"syllable": " hoh2 ","number": 2 },
			{"syllable": " ho4 ","number": 2 },
			{"syllable": " hing3 ","number": 2 },
			{"syllable": " hiau4 ","number": 2 },
			{"syllable": " hiann1 ","number": 2 },
			{"syllable": " hiang4 ","number": 2 },
			{"syllable": " hiah1 ","number": 2 },
			{"syllable": " hennh2 ","number": 2 },
			{"syllable": " he2 ","number": 2 },
			{"syllable": " hap2 ","number": 2 },
			{"syllable": " hannh5 ","number": 2 },
			{"syllable": " hannh1 ","number": 2 },
			{"syllable": " hang5 ","number": 2 },
			{"syllable": " han4 ","number": 2 },
			{"syllable": " hah1 ","number": 2 },
			{"syllable": " gut1 ","number": 2 },
			{"syllable": " guan4 ","number": 2 },
			{"syllable": " gin3 ","number": 2 },
			{"syllable": " gim1 ","number": 2 },
			{"syllable": " giam1 ","number": 2 },
			{"syllable": " gi1 ","number": 2 },
			{"syllable": " gen4 ","number": 2 },
			{"syllable": " gang5 ","number": 2 },
			{"syllable": " gah ","number": 2 },
			{"syllable": " en5 ","number": 2 },
			{"syllable": " en2 ","number": 2 },
			{"syllable": " duann1 ","number": 2 },
			{"syllable": " dua4 ","number": 2 },
			{"syllable": " dua2 ","number": 2 },
			{"syllable": " diunn5 ","number": 2 },
			{"syllable": " diunn1 ","number": 2 },
			{"syllable": " dit1 ","number": 2 },
			{"syllable": " di1 ","number": 2 },
			{"syllable": " deh1 ","number": 2 },
			{"syllable": " dau2 ","number": 2 },
			{"syllable": " dan3 ","number": 2 },
			{"syllable": " dan2 ","number": 2 },
			{"syllable": " cuan5 ","number": 2 },
			{"syllable": " ciunn2 ","number": 2 },
			{"syllable": " ciunn1 ","number": 2 },
			{"syllable": " ciu3 ","number": 2 },
			{"syllable": " ciu1 ","number": 2 },
			{"syllable": " cit2 ","number": 2 },
			{"syllable": " ciann4 ","number": 2 },
			{"syllable": " cau2 ","number": 2 },
			{"syllable": " cau1 ","number": 2 },
			{"syllable": " cang4 ","number": 2 },
			{"syllable": " cang2 ","number": 2 },
			{"syllable": " bun4 ","number": 2 },
			{"syllable": " bun1 ","number": 2 },
			{"syllable": " bue2 ","number": 2 },
			{"syllable": " bor3 ","number": 2 },
			{"syllable": " bo3 ","number": 2 },
			{"syllable": " binn2 ","number": 2 },
			{"syllable": " bing1 ","number": 2 },
			{"syllable": " biau1 ","number": 2 },
			{"syllable": " biann3 ","number": 2 },
			{"syllable": " ben4 ","number": 2 },
			{"syllable": " ben3 ","number": 2 },
			{"syllable": " bat3 ","number": 2 },
			{"syllable": " bak2 ","number": 2 },
			{"syllable": " ba5 ","number": 2 },
			{"syllable": " au5 ","number": 2 },
			{"syllable": " ang5 ","number": 2 },
			{"syllable": " ang1 ","number": 2 },
			{"syllable": " zun4 ","number": 1 },
			{"syllable": " zong4 ","number": 1 },
			{"syllable": " zong2 ","number": 1 },
			{"syllable": " zong1 ","number": 1 },
			{"syllable": " zo4 ","number": 1 },
			{"syllable": " ziu1 ","number": 1 },
			{"syllable": " ziorh3 ","number": 1 },
			{"syllable": " zior1 ","number": 1 },
			{"syllable": " ziong1 ","number": 1 },
			{"syllable": " zing1 ","number": 1 },
			{"syllable": " zim2 ","number": 1 },
			{"syllable": " ziau4 ","number": 1 },
			{"syllable": " ziap2 ","number": 1 },
			{"syllable": " ziann1 ","number": 1 },
			{"syllable": " zi2 ","number": 1 },
			{"syllable": " zau1 ","number": 1 },
			{"syllable": " zat3 ","number": 1 },
			{"syllable": " zap1 ","number": 1 },
			{"syllable": " zaih1 ","number": 1 },
			{"syllable": " zai5 ","number": 1 },
			{"syllable": " zai4 ","number": 1 },
			{"syllable": " zah1 ","number": 1 },
			{"syllable": " vun3 ","number": 1 },
			{"syllable": " vun1 ","number": 1 },
			{"syllable": " vue4 ","number": 1 },
			{"syllable": " vue1 ","number": 1 },
			{"syllable": " vua5 ","number": 1 },
			{"syllable": " vua4 ","number": 1 },
			{"syllable": " vu1 ","number": 1 },
			{"syllable": " vor1 ","number": 1 },
			{"syllable": " vo2 ","number": 1 },
			{"syllable": " vit3 ","number": 1 },
			{"syllable": " vit2 ","number": 1 },
			{"syllable": " vip3 ","number": 1 },
			{"syllable": " vin5 ","number": 1 },
			{"syllable": " viau2 ","number": 1 },
			{"syllable": " vang2 ","number": 1 },
			{"syllable": " vak3 ","number": 1 },
			{"syllable": " uat3 ","number": 1 },
			{"syllable": " uann4 ","number": 1 },
			{"syllable": " uann1 ","number": 1 },
			{"syllable": " uan5 ","number": 1 },
			{"syllable": " uan4 ","number": 1 },
			{"syllable": " uan2 ","number": 1 },
			{"syllable": " uah1 ","number": 1 },
			{"syllable": " u1 ","number": 1 },
			{"syllable": " tui4 ","number": 1 },
			{"syllable": " tuan2 ","number": 1 },
			{"syllable": " tor4 ","number": 1 },
			{"syllable": " tng3 ","number": 1 },
			{"syllable": " tng2 ","number": 1 },
			{"syllable": " tiau3 ","number": 1 },
			{"syllable": " tiau1 ","number": 1 },
			{"syllable": " teh2 ","number": 1 },
			{"syllable": " tang1 ","number": 1 },
			{"syllable": " tan3 ","number": 1 },
			{"syllable": " tam4 ","number": 1 },
			{"syllable": " ta1 ","number": 1 },
			{"syllable": " sun4 ","number": 1 },
			{"syllable": " sui5 ","number": 1 },
			{"syllable": " sui1 ","number": 1 },
			{"syllable": " sue4 ","number": 1 },
			{"syllable": " suann3 ","number": 1 },
			{"syllable": " suann1 ","number": 1 },
			{"syllable": " suan2 ","number": 1 },
			{"syllable": " suan1 ","number": 1 },
			{"syllable": " su4 ","number": 1 },
			{"syllable": " sor4 ","number": 1 },
			{"syllable": " song1 ","number": 1 },
			{"syllable": " so3 ","number": 1 },
			{"syllable": " sng1 ","number": 1 },
			{"syllable": " siu3 ","number": 1 },
			{"syllable": " sior ","number": 1 },
			{"syllable": " sionn3 ","number": 1 },
			{"syllable": " siong5 ","number": 1 },
			{"syllable": " siok2 ","number": 1 },
			{"syllable": " sim4 ","number": 1 },
			{"syllable": " sik3 ","number": 1 },
			{"syllable": " sik2 ","number": 1 },
			{"syllable": " sik1 ","number": 1 },
			{"syllable": " siau2 ","number": 1 },
			{"syllable": " siann2 ","number": 1 },
			{"syllable": " siang4 ","number": 1 },
			{"syllable": " senn3 ","number": 1 },
			{"syllable": " sen1 ","number": 1 },
			{"syllable": " se1 ","number": 1 },
			{"syllable": " sau4 ","number": 1 },
			{"syllable": " sai2 ","number": 1 },
			{"syllable": " s3 ","number": 1 },
			{"syllable": " ruah1 ","number": 1 },
			{"syllable": " ru2 ","number": 1 },
			{"syllable": " rit2 ","number": 1 },
			{"syllable": " rip ","number": 1 },
			{"syllable": " rin5 ","number": 1 },
			{"syllable": " rin2 ","number": 1 },
			{"syllable": " rim4 ","number": 1 },
			{"syllable": " rim3 ","number": 1 },
			{"syllable": " rim2 ","number": 1 },
			{"syllable": " rim1 ","number": 1 },
			{"syllable": " ria1 ","number": 1 },
			{"syllable": " ren3 ","number": 1 },
			{"syllable": " ren2 ","number": 1 },
			{"syllable": " quan5 ","number": 1 },
			{"syllable": " qua5 ","number": 1 },
			{"syllable": " qip3 ","number": 1 },
			{"syllable": " qip2 ","number": 1 },
			{"syllable": " qin5 ","number": 1 },
			{"syllable": " qiann4 ","number": 1 },
			{"syllable": " qiam2 ","number": 1 },
			{"syllable": " qia3 ","number": 1 },
			{"syllable": " qia2 ","number": 1 },
			{"syllable": " qen5 ","number": 1 },
			{"syllable": " qe2 ","number": 1 },
			{"syllable": " qau2 ","number": 1 },
			{"syllable": " pue4 ","number": 1 },
			{"syllable": " pue3 ","number": 1 },
			{"syllable": " pue2 ","number": 1 },
			{"syllable": " puann2 ","number": 1 },
			{"syllable": " pong2 ","number": 1 },
			{"syllable": " ping2 ","number": 1 },
			{"syllable": " pau3 ","number": 1 },
			{"syllable": " pang5 ","number": 1 },
			{"syllable": " pang1 ","number": 1 },
			{"syllable": " painn4 ","number": 1 },
			{"syllable": " pai3 ","number": 1 },
			{"syllable": " ong5 ","number": 1 },
			{"syllable": " ong4 ","number": 1 },
			{"syllable": " o4 ","number": 1 },
			{"syllable": " o ","number": 1 },
			{"syllable": " nqo4 ","number": 1 },
			{"syllable": " nqo3 ","number": 1 },
			{"syllable": " nqo2 ","number": 1 },
			{"syllable": " niu5 ","number": 1 },
			{"syllable": " nih2 ","number": 1 },
			{"syllable": " nia3 ","number": 1 },
			{"syllable": " ngh2 ","number": 1 },
			{"syllable": " ne3 ","number": 1 },
			{"syllable": " nau4 ","number": 1 },
			{"syllable": " nau3 ","number": 1 },
			{"syllable": " mui1 ","number": 1 },
			{"syllable": " mng5 ","number": 1 },
			{"syllable": " mng3 ","number": 1 },
			{"syllable": " mih2 ","number": 1 },
			{"syllable": " mia5 ","number": 1 },
			{"syllable": " mh1 ","number": 1 },
			{"syllable": " mau2 ","number": 1 },
			{"syllable": " m1 ","number": 1 },
			{"syllable": " lueh2 ","number": 1 },
			{"syllable": " luan4 ","number": 1 },
			{"syllable": " luai4 ","number": 1 },
			{"syllable": " luai3 ","number": 1 },
			{"syllable": " lua3 ","number": 1 },
			{"syllable": " lorh3 ","number": 1 },
			{"syllable": " lorh2 ","number": 1 },
			{"syllable": " lor2 ","number": 1 },
			{"syllable": " lok1 ","number": 1 },
			{"syllable": " loh3 ","number": 1 },
			{"syllable": " lo3 ","number": 1 },
			{"syllable": " liu1 ","number": 1 },
			{"syllable": " ling3 ","number": 1 },
			{"syllable": " lik3 ","number": 1 },
			{"syllable": " lih3 ","number": 1 },
			{"syllable": " lih2 ","number": 1 },
			{"syllable": " lih1 ","number": 1 },
			{"syllable": " liau2 ","number": 1 },
			{"syllable": " liap3 ","number": 1 },
			{"syllable": " liap1 ","number": 1 },
			{"syllable": " liam3 ","number": 1 },
			{"syllable": " lia2 ","number": 1 },
			{"syllable": " len3 ","number": 1 },
			{"syllable": " le5 ","number": 1 },
			{"syllable": " le4 ","number": 1 },
			{"syllable": " lat2 ","number": 1 },
			{"syllable": " lang1 ","number": 1 },
			{"syllable": " lam5 ","number": 1 },
			{"syllable": " lam3 ","number": 1 },
			{"syllable": " lam2 ","number": 1 },
			{"syllable": " lak2 ","number": 1 },
			{"syllable": " laim3 ","number": 1 },
			{"syllable": " la4 ","number": 1 },
			{"syllable": " kuinn4 ","number": 1 },
			{"syllable": " kuann2 ","number": 1 },
			{"syllable": " kuan2 ","number": 1 },
			{"syllable": " kuan1 ","number": 1 },
			{"syllable": " kuainn5 ","number": 1 },
			{"syllable": " kuainn4 ","number": 1 },
			{"syllable": " kuainn3 ","number": 1 },
			{"syllable": " kuai3 ","number": 1 },
			{"syllable": " ku2 ","number": 1 },
			{"syllable": " ku1 ","number": 1 },
			{"syllable": " kong4 ","number": 1 },
			{"syllable": " kong1 ","number": 1 },
			{"syllable": " kit1 ","number": 1 },
			{"syllable": " king3 ","number": 1 },
			{"syllable": " king ","number": 1 },
			{"syllable": " kin1 ","number": 1 },
			{"syllable": " kiau4 ","number": 1 },
			{"syllable": " kiang4 ","number": 1 },
			{"syllable": " kiam3 ","number": 1 },
			{"syllable": " kiam2 ","number": 1 },
			{"syllable": " kiai4 ","number": 1 },
			{"syllable": " kia2 ","number": 1 },
			{"syllable": " ki2 ","number": 1 },
			{"syllable": " ke3 ","number": 1 },
			{"syllable": " kah2 ","number": 1 },
			{"syllable": " ka4 ","number": 1 },
			{"syllable": " iorh1 ","number": 1 },
			{"syllable": " iong5 ","number": 1 },
			{"syllable": " inn2 ","number": 1 },
			{"syllable": " iah3 ","number": 1 },
			{"syllable": " hui4 ","number": 1 },
			{"syllable": " huat3 ","number": 1 },
			{"syllable": " huah2 ","number": 1 },
			{"syllable": " hu1 ","number": 1 },
			{"syllable": " honnh5 ","number": 1 },
			{"syllable": " honn4 ","number": 1 },
			{"syllable": " hong5 ","number": 1 },
			{"syllable": " hok3 ","number": 1 },
			{"syllable": " ho5 ","number": 1 },
			{"syllable": " ho1 ","number": 1 },
			{"syllable": " hng2 ","number": 1 },
			{"syllable": " hmh5 ","number": 1 },
			{"syllable": " hiong4 ","number": 1 },
			{"syllable": " hiong3 ","number": 1 },
			{"syllable": " hiong1 ","number": 1 },
			{"syllable": " hing2 ","number": 1 },
			{"syllable": " him2 ","number": 1 },
			{"syllable": " hiang1 ","number": 1 },
			{"syllable": " hiam2 ","number": 1 },
			{"syllable": " hennh3 ","number": 1 },
			{"syllable": " henn3 ","number": 1 },
			{"syllable": " henn2 ","number": 1 },
			{"syllable": " hen5 ","number": 1 },
			{"syllable": " hen2 ","number": 1 },
			{"syllable": " hau4 ","number": 1 },
			{"syllable": " hann5 ","number": 1 },
			{"syllable": " hann4 ","number": 1 },
			{"syllable": " han2 ","number": 1 },
			{"syllable": " ham3 ","number": 1 },
			{"syllable": " hah2 ","number": 1 },
			{"syllable": " ha2 ","number": 1 },
			{"syllable": " gun2 ","number": 1 },
			{"syllable": " gui3 ","number": 1 },
			{"syllable": " guat1 ","number": 1 },
			{"syllable": " guann2 ","number": 1 },
			{"syllable": " guann1 ","number": 1 },
			{"syllable": " guai3 ","number": 1 },
			{"syllable": " guah1 ","number": 1 },
			{"syllable": " gu2 ","number": 1 },
			{"syllable": " gu1 ","number": 1 },
			{"syllable": " gorh ","number": 1 },
			{"syllable": " gor2 ","number": 1 },
			{"syllable": " go2 ","number": 1 },
			{"syllable": " go1 ","number": 1 },
			{"syllable": " gng4 ","number": 1 },
			{"syllable": " gng1 ","number": 1 },
			{"syllable": " gip2 ","number": 1 },
			{"syllable": " gip1 ","number": 1 },
			{"syllable": " giong5 ","number": 1 },
			{"syllable": " giong4 ","number": 1 },
			{"syllable": " ginn4 ","number": 1 },
			{"syllable": " ging5 ","number": 1 },
			{"syllable": " gik2 ","number": 1 },
			{"syllable": " giann1 ","number": 1 },
			{"syllable": " get2 ","number": 1 },
			{"syllable": " gen3 ","number": 1 },
			{"syllable": " gen2 ","number": 1 },
			{"syllable": " gann4 ","number": 1 },
			{"syllable": " gang4 ","number": 1 },
			{"syllable": " gam2 ","number": 1 },
			{"syllable": " ga1 ","number": 1 },
			{"syllable": " eh5 ","number": 1 },
			{"syllable": " dun1 ","number": 1 },
			{"syllable": " dui2 ","number": 1 },
			{"syllable": " dueh2 ","number": 1 },
			{"syllable": " due4 ","number": 1 },
			{"syllable": " dong1 ","number": 1 },
			{"syllable": " dit2 ","number": 1 },
			{"syllable": " ding5 ","number": 1 },
			{"syllable": " din4 ","number": 1 },
			{"syllable": " din3 ","number": 1 },
			{"syllable": " dik3 ","number": 1 },
			{"syllable": " dik2 ","number": 1 },
			{"syllable": " dik1 ","number": 1 },
			{"syllable": " dih1 ","number": 1 },
			{"syllable": " diam2 ","number": 1 },
			{"syllable": " de ","number": 1 },
			{"syllable": " dann4 ","number": 1 },
			{"syllable": " dann3 ","number": 1 },
			{"syllable": " dan5 ","number": 1 },
			{"syllable": " dam1 ","number": 1 },
			{"syllable": " dah2 ","number": 1 },
			{"syllable": " da3 ","number": 1 },
			{"syllable": " da2 ","number": 1 },
			{"syllable": " cut3 ","number": 1 },
			{"syllable": " cua2 ","number": 1 },
			{"syllable": " cu1 ","number": 1 },
			{"syllable": " cor3 ","number": 1 },
			{"syllable": " cong4 ","number": 1 },
			{"syllable": " co2 ","number": 1 },
			{"syllable": " co1 ","number": 1 },
			{"syllable": " ciorh3 ","number": 1 },
			{"syllable": " cior4 ","number": 1 },
			{"syllable": " cior3 ","number": 1 },
			{"syllable": " ciong3 ","number": 1 },
			{"syllable": " cinn4 ","number": 1 },
			{"syllable": " cinn2 ","number": 1 },
			{"syllable": " cing3 ","number": 1 },
			{"syllable": " ciah2 ","number": 1 },
			{"syllable": " ci5 ","number": 1 },
			{"syllable": " ci4 ","number": 1 },
			{"syllable": " ci3 ","number": 1 },
			{"syllable": " cet1 ","number": 1 },
			{"syllable": " cenn2 ","number": 1 },
			{"syllable": " cen2 ","number": 1 },
			{"syllable": " cap2 ","number": 1 },
			{"syllable": " cam2 ","number": 1 },
			{"syllable": " ca1 ","number": 1 },
			{"syllable": " bun2 ","number": 1 },
			{"syllable": " bor5 ","number": 1 },
			{"syllable": " bor2 ","number": 1 },
			{"syllable": " bo1 ","number": 1 },
			{"syllable": " bng4 ","number": 1 },
			{"syllable": " bit3 ","number": 1 },
			{"syllable": " bing5 ","number": 1 },
			{"syllable": " bing2 ","number": 1 },
			{"syllable": " bik1 ","number": 1 },
			{"syllable": " biah2 ","number": 1 },
			{"syllable": " bi4 ","number": 1 },
			{"syllable": " bi2 ","number": 1 },
			{"syllable": " benn3 ","number": 1 },
			{"syllable": " be4 ","number": 1 },
			{"syllable": " be3 ","number": 1 },
			{"syllable": " be2 ","number": 1 },
			{"syllable": " bau ","number": 1 },
			{"syllable": " bak3 ","number": 1 },
			{"syllable": " bai5 ","number": 1 },
			{"syllable": " bah3 ","number": 1 },
			{"syllable": " bah1 ","number": 1 },
			{"syllable": " ap1 ","number": 1 },
			{"syllable": " ang3 ","number": 1 },
			{"syllable": " an5 ","number": 1 },
			{"syllable": " an3 ","number": 1 },
			{"syllable": " aih3 ","number": 1 },
			{"syllable": " ai2 ","number": 1 },
			{"syllable": " a5 ","number": 1 },
			{"syllable": " a11 ","number": 1 },
];
	Morris.Bar({
		  element: 'Bar',
		  data: data, 
		  xkey: 'syllable',
		  ymax: 'auto',
		  ykeys: ['number'],
		  labels: ['syllable','number']
		});
	});
</script>
<body>
	<div id="Bar"></div>
	<pre id="code" class="prettyprint linenums">
<a href="http://140.109.18.117/GitRepos/finish/DaAi/vvrs04-20130309(0324)-20130420.trs">http://140.109.18.117/GitRepos/finish/DaAi/vvrs04-20130309(0324)-20130420.trs</a>
<a href="http://140.109.18.117/GitRepos/finish/DaAi/vvrs07-20130308(0404)-0422.trs">http://140.109.18.117/GitRepos/finish/DaAi/vvrs07-20130308(0404)-0422.trs</a>
<br>
<a href="http://140.109.18.117/download_page/serachfile.html?a2"> 1 	 a2  :  343 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?li1"> 2 	 li1  :  268 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?la3"> 3 	 la3  :  260 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qua1"> 4 	 qua1  :  217 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?e3"> 5 	 e3  :  201 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?si3"> 6 	 si3  :  188 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?a3"> 7 	 a3  :  182 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?honnh2"> 8 	 honnh2  :  160 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hor4"> 9 	 hor4  :  148 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?e2"> 10 	 e2  :  136 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ah1"> 11 	 ah1  :  119 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vu4"> 12 	 vu4  :  117 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?oh2"> 13 	 oh2  :  100 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?m3"> 14 	 m3  :  91 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zit3"> 15 	 zit3  :  88 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gorh1"> 16 	 gorh1  :  86 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lai5"> 17 	 lai5  :  85 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dor3"> 18 	 dor3  :  85 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?a1"> 19 	 a1  :  83 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vor2"> 20 	 vor2  :  80 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?u3"> 21 	 u3  :  80 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?an1"> 22 	 an1  :  80 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?i2"> 23 	 i2  :  70 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lai2"> 24 	 lai2  :  62 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ai4"> 25 	 ai4  :  61 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?veh1"> 26 	 veh1  :  60 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ziah1"> 27 	 ziah1  :  59 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ve3"> 28 	 ve3  :  59 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ma3"> 29 	 ma3  :  58 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gong1"> 30 	 gong1  :  56 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ne1"> 31 	 ne1  :  54 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?long1"> 32 	 long1  :  53 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ziok1"> 33 	 ziok1  :  52 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lin1"> 34 	 lin1  :  52 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zit1"> 35 	 zit1  :  50 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?oh3"> 36 	 oh3  :  50 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?neh2"> 37 	 neh2  :  50 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ki3"> 38 	 ki3  :  50 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ga3"> 39 	 ga3  :  47 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kuann4"> 40 	 kuann4  :  46 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ki1"> 41 	 ki1  :  46 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ziah3"> 42 	 ziah3  :  45 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hor1"> 43 	 hor1  :  45 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bah2"> 44 	 bah2  :  45 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ze1"> 45 	 ze1  :  42 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gah1"> 46 	 gah1  :  42 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kah1"> 47 	 kah1  :  41 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lan1"> 48 	 lan1  :  39 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gong4"> 49 	 gong4  :  39 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zor4"> 50 	 zor4  :  38 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?na3"> 51 	 na3  :  38 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zi4"> 52 	 zi4  :  37 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zinn5"> 53 	 zinn5  :  36 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?e1"> 54 	 e1  :  36 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mai4"> 55 	 mai4  :  35 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vor3"> 56 	 vor3  :  34 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ho3"> 57 	 ho3  :  34 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zai2"> 58 	 zai2  :  33 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?na4"> 59 	 na4  :  33 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siunn3"> 60 	 siunn3  :  32 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sing2"> 61 	 sing2  :  31 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?li3"> 62 	 li3  :  30 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?a4"> 63 	 a4  :  30 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ziah2"> 64 	 ziah2  :  28 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?di3"> 65 	 di3  :  28 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dai3"> 66 	 dai3  :  28 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lai3"> 67 	 lai3  :  27 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zing3"> 68 	 zing3  :  26 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lang5"> 69 	 lang5  :  26 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hui2"> 70 	 hui2  :  26 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ga2"> 71 	 ga2  :  26 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dor2"> 72 	 dor2  :  26 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zi3"> 73 	 zi3  :  25 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?he1"> 74 	 he1  :  25 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dior3"> 75 	 dior3  :  25 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zin2"> 76 	 zin2  :  24 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sui4"> 77 	 sui4  :  24 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?li4"> 78 	 li4  :  24 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gam1"> 79 	 gam1  :  24 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?eh2"> 80 	 eh2  :  24 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dang4"> 81 	 dang4  :  24 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zia1"> 82 	 zia1  :  23 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?leh1"> 83 	 leh1  :  23 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kuann3"> 84 	 kuann3  :  23 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ge1"> 85 	 ge1  :  23 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?diorh2"> 86 	 diorh2  :  23 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dau4"> 87 	 dau4  :  23 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?si2"> 88 	 si2  :  22 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hok2"> 89 	 hok2  :  22 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dua3"> 90 	 dua3  :  22 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siann1"> 91 	 siann1  :  21 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ma4"> 92 	 ma4  :  21 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?le2"> 93 	 le2  :  21 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?it1"> 94 	 it1  :  21 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ge2"> 95 	 ge2  :  21 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ah2"> 96 	 ah2  :  21 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?len5"> 97 	 len5  :  20 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lang2"> 98 	 lang2  :  20 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?huat1"> 99 	 huat1  :  20 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ge3"> 100 	 ge3  :  20 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sim1"> 101 	 sim1  :  19 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?na1"> 102 	 na1  :  19 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mih1"> 103 	 mih1  :  19 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gin4"> 104 	 gin4  :  19 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gang2"> 105 	 gang2  :  19 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cai3"> 106 	 cai3  :  19 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ziann2"> 107 	 ziann2  :  18 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ze2"> 108 	 ze2  :  18 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vor5"> 109 	 vor5  :  18 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qua3"> 110 	 qua3  :  18 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?i1"> 111 	 i1  :  18 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?diorh3"> 112 	 diorh3  :  18 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tiam2"> 113 	 tiam2  :  17 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qin1"> 114 	 qin1  :  17 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?huann2"> 115 	 huann2  :  17 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ho2"> 116 	 ho2  :  17 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gor1"> 117 	 gor1  :  17 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dang2"> 118 	 dang2  :  17 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zu4"> 119 	 zu4  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zin1"> 120 	 zin1  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vi1"> 121 	 vi1  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ui3"> 122 	 ui3  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?u2"> 123 	 u2  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tau2"> 124 	 tau2  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sit3"> 125 	 sit3  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siong3"> 126 	 siong3  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?se4"> 127 	 se4  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qo3"> 128 	 qo3  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?o3"> 129 	 o3  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mai2"> 130 	 mai2  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lu1"> 131 	 lu1  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?liau4"> 132 	 liau4  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ko1"> 133 	 ko1  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hannh2"> 134 	 hannh2  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?han3"> 135 	 han3  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gue4"> 136 	 gue4  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dan4"> 137 	 dan4  :  16 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ue2"> 138 	 ue2  :  15 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?so4"> 139 	 so4  :  15 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mh2"> 140 	 mh2  :  15 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hi4"> 141 	 hi4  :  15 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gin1"> 142 	 gin1  :  15 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dui4"> 143 	 dui4  :  15 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dng4"> 144 	 dng4  :  15 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dak3"> 145 	 dak3  :  15 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sin2"> 146 	 sin2  :  14 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sann2"> 147 	 sann2  :  14 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?de3"> 148 	 de3  :  14 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zor3"> 149 	 zor3  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zai1"> 150 	 zai1  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ven1"> 151 	 ven1  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vai4"> 152 	 vai4  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tau5"> 153 	 tau5  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sun3"> 154 	 sun3  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ri2"> 155 	 ri2  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qun1"> 156 	 qun1  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?o2"> 157 	 o2  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lor4"> 158 	 lor4  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?leh3"> 159 	 leh3  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iorh3"> 160 	 iorh3  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iau4"> 161 	 iau4  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?i4"> 162 	 i4  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gior4"> 163 	 gior4  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?giann5"> 164 	 giann5  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bau2"> 165 	 bau2  :  13 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sen2"> 166 	 sen2  :  12 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?nai4"> 167 	 nai4  :  12 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hi2"> 168 	 hi2  :  12 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gin2"> 169 	 gin2  :  12 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gi2"> 170 	 gi2  :  12 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cu3"> 171 	 cu3  :  12 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bng2"> 172 	 bng2  :  12 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ban1"> 173 	 ban1  :  12 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zu1"> 174 	 zu1  :  11 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zok1"> 175 	 zok1  :  11 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vang3"> 176 	 vang3  :  11 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sior1"> 177 	 sior1  :  11 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siong4"> 178 	 siong4  :  11 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qua2"> 179 	 qua2  :  11 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mui2"> 180 	 mui2  :  11 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?in2"> 181 	 in2  :  11 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iann1"> 182 	 iann1  :  11 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?guai1"> 183 	 guai1  :  11 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?giann4"> 184 	 giann4  :  11 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ge4"> 185 	 ge4  :  11 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?e5"> 186 	 e5  :  11 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ding3"> 187 	 ding3  :  11 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cin1"> 188 	 cin1  :  11 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zuann4"> 189 	 zuann4  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zu3"> 190 	 zu3  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sinn1"> 191 	 sinn1  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?liau1"> 192 	 liau1  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?li2"> 193 	 li2  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?le3"> 194 	 le3  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kuai4"> 195 	 kuai4  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ko4"> 196 	 ko4  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ing5"> 197 	 ing5  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iau1"> 198 	 iau1  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iah1"> 199 	 iah1  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?i3"> 200 	 i3  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hit1"> 201 	 hit1  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ging2"> 202 	 ging2  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?giann2"> 203 	 giann2  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gau3"> 204 	 gau3  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gang1"> 205 	 gang1  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dinn1"> 206 	 dinn1  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cut1"> 207 	 cut1  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cu4"> 208 	 cu4  :  10 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zun2"> 209 	 zun2  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ve2"> 210 	 ve2  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ve1"> 211 	 ve1  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?su2"> 212 	 su2  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sim2"> 213 	 sim2  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sia2"> 214 	 sia2  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sia1"> 215 	 sia1  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?quan2"> 216 	 quan2  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ni5"> 217 	 ni5  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?na2"> 218 	 na2  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kor1"> 219 	 kor1  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iann4"> 220 	 iann4  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ha3"> 221 	 ha3  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gong2"> 222 	 gong2  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gau4"> 223 	 gau4  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ga4"> 224 	 ga4  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cun2"> 225 	 cun2  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ciann1"> 226 	 ciann1  :  9 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zui1"> 227 	 zui1  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ze3"> 228 	 ze3  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zau4"> 229 	 zau4  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?za2"> 230 	 za2  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ui2"> 231 	 ui2  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tiann2"> 232 	 tiann2  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?te4"> 233 	 te4  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tan4"> 234 	 tan4  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siunn2"> 235 	 siunn2  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?si5"> 236 	 si5  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?si4"> 237 	 si4  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?se3"> 238 	 se3  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lin2"> 239 	 lin2  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lau2"> 240 	 lau2  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?la2"> 241 	 la2  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ing4"> 242 	 ing4  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hun2"> 243 	 hun2  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hue3"> 244 	 hue3  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?huan2"> 245 	 huan2  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hong4"> 246 	 hong4  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gang3"> 247 	 gang3  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gan2"> 248 	 gan2  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gak1"> 249 	 gak1  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gai4"> 250 	 gai4  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dong2"> 251 	 dong2  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dan1"> 252 	 dan1  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cai4"> 253 	 cai4  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?beh2"> 254 	 beh2  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?aih2"> 255 	 aih2  :  8 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zing5"> 256 	 zing5  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ziann4"> 257 	 ziann4  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zap3"> 258 	 zap3  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?so1"> 259 	 so1  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siu1"> 260 	 siu1  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sit2"> 261 	 sit2  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siong1"> 262 	 siong1  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sin1"> 263 	 sin1  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siannh2"> 264 	 siannh2  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?o1"> 265 	 o1  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kuan4"> 266 	 kuan4  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kor3"> 267 	 kor3  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iong3"> 268 	 iong3  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ing2"> 269 	 ing2  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?huat2"> 270 	 huat2  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hia1"> 271 	 hia1  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hak3"> 272 	 hak3  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?guai2"> 273 	 guai2  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ging1"> 274 	 ging1  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ga5"> 275 	 ga5  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dor4"> 276 	 dor4  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dit3"> 277 	 dit3  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?de4"> 278 	 de4  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?da4"> 279 	 da4  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cun1"> 280 	 cun1  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cing2"> 281 	 cing2  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bai4"> 282 	 bai4  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ang2"> 283 	 ang2  :  7 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ziong2"> 284 	 ziong2  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?za4"> 285 	 za4  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vin2"> 286 	 vin2  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?uah2"> 287 	 uah2  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?te3"> 288 	 te3  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?su1"> 289 	 su1  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sit1"> 290 	 sit1  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?painn1"> 291 	 painn1  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?or2"> 292 	 or2  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?nng3"> 293 	 nng3  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ni3"> 294 	 ni3  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ni2"> 295 	 ni2  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mih3"> 296 	 mih3  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?len2"> 297 	 len2  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lau3"> 298 	 lau3  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kue3"> 299 	 kue3  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kor4"> 300 	 kor4  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kng4"> 301 	 kng4  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kau3"> 302 	 kau3  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kang2"> 303 	 kang2  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hue1"> 304 	 hue1  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hang2"> 305 	 hang2  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hai2"> 306 	 hai2  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gue3"> 307 	 gue3  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?guan3"> 308 	 guan3  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?guan2"> 309 	 guan2  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gu4"> 310 	 gu4  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ging4"> 311 	 ging4  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gi3"> 312 	 gi3  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gai2"> 313 	 gai2  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?du1"> 314 	 du1  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dor1"> 315 	 dor1  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?do2"> 316 	 do2  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cue3"> 317 	 cue3  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?binn1"> 318 	 binn1  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bi1"> 319 	 bi1  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ban3"> 320 	 ban3  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ba4"> 321 	 ba4  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?au2"> 322 	 au2  :  6 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zui4"> 323 	 zui4  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zik2"> 324 	 zik2  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zi1"> 325 	 zi1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?za1"> 326 	 za1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vue3"> 327 	 vue3  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vuai5"> 328 	 vuai5  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vo3"> 329 	 vo3  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?uann3"> 330 	 uann3  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tiann3"> 331 	 tiann3  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tiam1"> 332 	 tiam1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siu2"> 333 	 siu2  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sin4"> 334 	 sin4  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sia4"> 335 	 sia4  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ri3"> 336 	 ri3  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?quat3"> 337 	 quat3  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?pen2"> 338 	 pen2  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?pa4"> 339 	 pa4  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?orh1"> 340 	 orh1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?nua4"> 341 	 nua4  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?me2"> 342 	 me2  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lo5"> 343 	 lo5  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?le1"> 344 	 le1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kun3"> 345 	 kun3  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kui2"> 346 	 kui2  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?king1"> 347 	 king1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kai4"> 348 	 kai4  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iau3"> 349 	 iau3  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?i5"> 350 	 i5  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hun4"> 351 	 hun4  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hue2"> 352 	 hue2  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hior4"> 353 	 hior4  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gui1"> 354 	 gui1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?go4"> 355 	 go4  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gi4"> 356 	 gi4  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gan1"> 357 	 gan1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?eh3"> 358 	 eh3  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dng3"> 359 	 dng3  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dng2"> 360 	 dng2  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dng1"> 361 	 dng1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ding4"> 362 	 ding4  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?diam1"> 363 	 diam1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?de5"> 364 	 de5  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?de2"> 365 	 de2  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dau1"> 366 	 dau1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dann1"> 367 	 dann1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cui3"> 368 	 cui3  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cinn1"> 369 	 cinn1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ceh2"> 370 	 ceh2  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?can2"> 371 	 can2  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?but1"> 372 	 but1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bin1"> 373 	 bin1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?benn2"> 374 	 benn2  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bau1"> 375 	 bau1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bang4"> 376 	 bang4  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bak1"> 377 	 bak1  :  5 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zin4"> 378 	 zin4  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zia4"> 379 	 zia4  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zau5"> 380 	 zau5  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vi2"> 381 	 vi2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ven4"> 382 	 ven4  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?van3"> 383 	 van3  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ui4"> 384 	 ui4  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tiau2"> 385 	 tiau2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tiann1"> 386 	 tiann1  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tang2"> 387 	 tang2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sui2"> 388 	 sui2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?su3"> 389 	 su3  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sai3"> 390 	 sai3  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?quan1"> 391 	 quan1  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qua4"> 392 	 qua4  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mng2"> 393 	 mng2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?me5"> 394 	 me5  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lit2"> 395 	 lit2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lip2"> 396 	 lip2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lin3"> 397 	 lin3  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lik2"> 398 	 lik2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?liap2"> 399 	 liap2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lang3"> 400 	 lang3  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kui1"> 401 	 kui1  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?koh2"> 402 	 koh2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kng3"> 403 	 kng3  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kau4"> 404 	 kau4  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ka1"> 405 	 ka1  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ior1"> 406 	 ior1  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iong2"> 407 	 iong2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?in1"> 408 	 in1  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hui3"> 409 	 hui3  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hue4"> 410 	 hue4  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?huan5"> 411 	 huan5  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hi1"> 412 	 hi1  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hau3"> 413 	 hau3  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hau2"> 414 	 hau2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ha1"> 415 	 ha1  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gui2"> 416 	 gui2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?guai4"> 417 	 guai4  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gua3"> 418 	 gua3  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gua1"> 419 	 gua1  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gor4"> 420 	 gor4  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?giong2"> 421 	 giong2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ging3"> 422 	 ging3  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gau1"> 423 	 gau1  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dong3"> 424 	 dong3  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?do4"> 425 	 do4  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?diong3"> 426 	 diong3  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ding1"> 427 	 ding1  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?diau5"> 428 	 diau5  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?diann3"> 429 	 diann3  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?diam4"> 430 	 diam4  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dam2"> 431 	 dam2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cue2"> 432 	 cue2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ciunn3"> 433 	 ciunn3  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ciu4"> 434 	 ciu4  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ce2"> 435 	 ce2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ca2"> 436 	 ca2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?buann2"> 437 	 buann2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bo2"> 438 	 bo2  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bat1"> 439 	 bat1  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bai3"> 440 	 bai3  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?am4"> 441 	 am4  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ai3"> 442 	 ai3  :  4 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zior4"> 443 	 zior4  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zin3"> 444 	 zin3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zim4"> 445 	 zim4  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vok3"> 446 	 vok3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vo4"> 447 	 vo4  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vo1"> 448 	 vo1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ving2"> 449 	 ving2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vi3"> 450 	 vi3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ve4"> 451 	 ve4  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vat2"> 452 	 vat2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vat1"> 453 	 vat1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?van2"> 454 	 van2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?un3"> 455 	 un3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tua2"> 456 	 tua2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tok2"> 457 	 tok2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tng5"> 458 	 tng5  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tinn2"> 459 	 tinn2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tak3"> 460 	 tak3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sng4"> 461 	 sng4  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sng3"> 462 	 sng3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siong2"> 463 	 siong2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sing1"> 464 	 sing1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siau4"> 465 	 siau4  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sia3"> 466 	 sia3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?senn2"> 467 	 senn2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?senn1"> 468 	 senn1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sannh2"> 469 	 sannh2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sann1"> 470 	 sann1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ren5"> 471 	 ren5  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qo2"> 472 	 qo2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qau5"> 473 	 qau5  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?pang2"> 474 	 pang2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?pai1"> 475 	 pai1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?orh3"> 476 	 orh3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?oh1"> 477 	 oh1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mi4"> 478 	 mi4  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ma2"> 479 	 ma2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lor3"> 480 	 lor3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lo2"> 481 	 lo2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lit3"> 482 	 lit3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lim2"> 483 	 lim2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lim1"> 484 	 lim1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?liam2"> 485 	 liam2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lia1"> 486 	 lia1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?li"> 487 	 li  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?leh2"> 488 	 leh2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lau1"> 489 	 lau1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lan5"> 490 	 lan5  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?laih2"> 491 	 laih2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kun4"> 492 	 kun4  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kit3"> 493 	 kit3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kit2"> 494 	 kit2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kin2"> 495 	 kin2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kiai3"> 496 	 kiai3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kai2"> 497 	 kai2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ka2"> 498 	 ka2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iu5"> 499 	 iu5  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iu2"> 500 	 iu2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iu1"> 501 	 iu1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iorh2"> 502 	 iorh2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hun1"> 503 	 hun1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hua5"> 504 	 hua5  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hua4"> 505 	 hua4  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?honnh3"> 506 	 honnh3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hioh2"> 507 	 hioh2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hing5"> 508 	 hing5  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hing4"> 509 	 hing4  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hiau1"> 510 	 hiau1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hang3"> 511 	 hang3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?guan5"> 512 	 guan5  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?guan1"> 513 	 guan1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gior3"> 514 	 gior3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gau2"> 515 	 gau2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gann1"> 516 	 gann1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gam4"> 517 	 gam4  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gai1"> 518 	 gai1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?eh1"> 519 	 eh1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dorh2"> 520 	 dorh2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?diong1"> 521 	 diong1  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dinn2"> 522 	 dinn2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ding2"> 523 	 ding2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?din2"> 524 	 din2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?diau2"> 525 	 diau2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?di2"> 526 	 di2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dau3"> 527 	 dau3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dam3"> 528 	 dam3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dai2"> 529 	 dai2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cut2"> 530 	 cut2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cua3"> 531 	 cua3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cor4"> 532 	 cor4  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ci2"> 533 	 ci2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?buat3"> 534 	 buat3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bit2"> 535 	 bit2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?beh3"> 536 	 beh3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bang2"> 537 	 bang2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bai2"> 538 	 bai2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?au3"> 539 	 au3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?an2"> 540 	 an2  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?am3"> 541 	 am3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ah3"> 542 	 ah3  :  3 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zun1"> 543 	 zun1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zuat3"> 544 	 zuat3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zuan2"> 545 	 zuan2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zng1"> 546 	 zng1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zit"> 547 	 zit  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ziong4"> 548 	 ziong4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ziong3"> 549 	 ziong3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zing4"> 550 	 zing4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zing2"> 551 	 zing2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zik1"> 552 	 zik1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ze4"> 553 	 ze4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zau2"> 554 	 zau2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zam2"> 555 	 zam2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zai3"> 556 	 zai3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?za5"> 557 	 za5  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vun5"> 558 	 vun5  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vue2"> 559 	 vue2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vong2"> 560 	 vong2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vin3"> 561 	 vin3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vat3"> 562 	 vat3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vai3"> 563 	 vai3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vai2"> 564 	 vai2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?un2"> 565 	 un2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?un1"> 566 	 un1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tuan5"> 567 	 tuan5  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tng1"> 568 	 tng1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tinn1"> 569 	 tinn1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tiam4"> 570 	 tiam4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?suah1"> 571 	 suah1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sua1"> 572 	 sua1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siunn1"> 573 	 siunn1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siorh2"> 574 	 siorh2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sior4"> 575 	 sior4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sior2"> 576 	 sior2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siok3"> 577 	 siok3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sing4"> 578 	 sing4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siann4"> 579 	 siann4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siang2"> 580 	 siang2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?senn4"> 581 	 senn4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sang3"> 582 	 sang3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sang2"> 583 	 sang2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sang1"> 584 	 sang1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?san4"> 585 	 san4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sai1"> 586 	 sai1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?rip3"> 587 	 rip3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?rin3"> 588 	 rin3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?queh2"> 589 	 queh2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?quan3"> 590 	 quan3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qik2"> 591 	 qik2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qiap2"> 592 	 qiap2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qi2"> 593 	 qi2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?pua4"> 594 	 pua4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?pen4"> 595 	 pen4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?oh5"> 596 	 oh5  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?nua1"> 597 	 nua1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?nqo1"> 598 	 nqo1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?niu3"> 599 	 niu3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?nia1"> 600 	 nia1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ne2"> 601 	 ne2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?nai3"> 602 	 nai3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mui3"> 603 	 mui3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?meh2"> 604 	 meh2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?me1"> 605 	 me1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mai3"> 606 	 mai3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mah3"> 607 	 mah3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ma1"> 608 	 ma1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?m5"> 609 	 m5  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lun3"> 610 	 lun3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lue3"> 611 	 lue3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lok2"> 612 	 lok2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lit1"> 613 	 lit1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lip3"> 614 	 lip3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?liong2"> 615 	 liong2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ling2"> 616 	 ling2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lin4"> 617 	 lin4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?let2"> 618 	 let2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lap3"> 619 	 lap3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lak3"> 620 	 lak3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lak1"> 621 	 lak1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ki4"> 622 	 ki4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?keh2"> 623 	 keh2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kan2"> 624 	 kan2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ior3"> 625 	 ior3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iong1"> 626 	 iong1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ing3"> 627 	 ing3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ing1"> 628 	 ing1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hue5"> 629 	 hue5  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hu4"> 630 	 hu4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hu3"> 631 	 hu3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hong1"> 632 	 hong1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hoh3"> 633 	 hoh3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hoh2"> 634 	 hoh2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ho4"> 635 	 ho4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hing3"> 636 	 hing3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hiau4"> 637 	 hiau4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hiann1"> 638 	 hiann1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hiang4"> 639 	 hiang4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hiah1"> 640 	 hiah1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hennh2"> 641 	 hennh2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?he2"> 642 	 he2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hap2"> 643 	 hap2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hannh5"> 644 	 hannh5  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hannh1"> 645 	 hannh1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hang5"> 646 	 hang5  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?han4"> 647 	 han4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hah1"> 648 	 hah1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gut1"> 649 	 gut1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?guan4"> 650 	 guan4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gin3"> 651 	 gin3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gim1"> 652 	 gim1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?giam1"> 653 	 giam1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gi1"> 654 	 gi1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gen4"> 655 	 gen4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gang5"> 656 	 gang5  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gah"> 657 	 gah  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?en5"> 658 	 en5  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?en2"> 659 	 en2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?duann1"> 660 	 duann1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dua4"> 661 	 dua4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dua2"> 662 	 dua2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?diunn5"> 663 	 diunn5  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?diunn1"> 664 	 diunn1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dit1"> 665 	 dit1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?di1"> 666 	 di1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?deh1"> 667 	 deh1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dau2"> 668 	 dau2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dan3"> 669 	 dan3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dan2"> 670 	 dan2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cuan5"> 671 	 cuan5  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ciunn2"> 672 	 ciunn2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ciunn1"> 673 	 ciunn1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ciu3"> 674 	 ciu3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ciu1"> 675 	 ciu1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cit2"> 676 	 cit2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ciann4"> 677 	 ciann4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cau2"> 678 	 cau2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cau1"> 679 	 cau1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cang4"> 680 	 cang4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cang2"> 681 	 cang2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bun4"> 682 	 bun4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bun1"> 683 	 bun1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bue2"> 684 	 bue2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bor3"> 685 	 bor3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bo3"> 686 	 bo3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?binn2"> 687 	 binn2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bing1"> 688 	 bing1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?biau1"> 689 	 biau1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?biann3"> 690 	 biann3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ben4"> 691 	 ben4  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ben3"> 692 	 ben3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bat3"> 693 	 bat3  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bak2"> 694 	 bak2  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ba5"> 695 	 ba5  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?au5"> 696 	 au5  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ang5"> 697 	 ang5  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ang1"> 698 	 ang1  :  2 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zun4"> 699 	 zun4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zong4"> 700 	 zong4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zong2"> 701 	 zong2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zong1"> 702 	 zong1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zo4"> 703 	 zo4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ziu1"> 704 	 ziu1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ziorh3"> 705 	 ziorh3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zior1"> 706 	 zior1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ziong1"> 707 	 ziong1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zing1"> 708 	 zing1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zim2"> 709 	 zim2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ziau4"> 710 	 ziau4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ziap2"> 711 	 ziap2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ziann1"> 712 	 ziann1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zi2"> 713 	 zi2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zau1"> 714 	 zau1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zat3"> 715 	 zat3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zap1"> 716 	 zap1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zaih1"> 717 	 zaih1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zai5"> 718 	 zai5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zai4"> 719 	 zai4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?zah1"> 720 	 zah1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vun3"> 721 	 vun3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vun1"> 722 	 vun1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vue4"> 723 	 vue4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vue1"> 724 	 vue1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vua5"> 725 	 vua5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vua4"> 726 	 vua4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vu1"> 727 	 vu1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vor1"> 728 	 vor1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vo2"> 729 	 vo2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vit3"> 730 	 vit3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vit2"> 731 	 vit2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vip3"> 732 	 vip3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vin5"> 733 	 vin5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?viau2"> 734 	 viau2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vang2"> 735 	 vang2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?vak3"> 736 	 vak3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?uat3"> 737 	 uat3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?uann4"> 738 	 uann4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?uann1"> 739 	 uann1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?uan5"> 740 	 uan5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?uan4"> 741 	 uan4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?uan2"> 742 	 uan2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?uah1"> 743 	 uah1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?u1"> 744 	 u1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tui4"> 745 	 tui4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tuan2"> 746 	 tuan2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tor4"> 747 	 tor4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tng3"> 748 	 tng3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tng2"> 749 	 tng2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tiau3"> 750 	 tiau3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tiau1"> 751 	 tiau1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?teh2"> 752 	 teh2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tang1"> 753 	 tang1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tan3"> 754 	 tan3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?tam4"> 755 	 tam4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ta1"> 756 	 ta1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sun4"> 757 	 sun4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sui5"> 758 	 sui5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sui1"> 759 	 sui1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sue4"> 760 	 sue4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?suann3"> 761 	 suann3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?suann1"> 762 	 suann1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?suan2"> 763 	 suan2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?suan1"> 764 	 suan1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?su4"> 765 	 su4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sor4"> 766 	 sor4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?song1"> 767 	 song1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?so3"> 768 	 so3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sng1"> 769 	 sng1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siu3"> 770 	 siu3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sior"> 771 	 sior  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sionn3"> 772 	 sionn3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siong5"> 773 	 siong5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siok2"> 774 	 siok2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sim4"> 775 	 sim4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sik3"> 776 	 sik3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sik2"> 777 	 sik2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sik1"> 778 	 sik1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siau2"> 779 	 siau2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siann2"> 780 	 siann2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?siang4"> 781 	 siang4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?senn3"> 782 	 senn3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sen1"> 783 	 sen1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?se1"> 784 	 se1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sau4"> 785 	 sau4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?sai2"> 786 	 sai2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?s3"> 787 	 s3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ruah1"> 788 	 ruah1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ru2"> 789 	 ru2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?rit2"> 790 	 rit2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?rip"> 791 	 rip  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?rin5"> 792 	 rin5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?rin2"> 793 	 rin2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?rim4"> 794 	 rim4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?rim3"> 795 	 rim3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?rim2"> 796 	 rim2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?rim1"> 797 	 rim1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ria1"> 798 	 ria1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ren3"> 799 	 ren3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ren2"> 800 	 ren2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?quan5"> 801 	 quan5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qua5"> 802 	 qua5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qip3"> 803 	 qip3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qip2"> 804 	 qip2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qin5"> 805 	 qin5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qiann4"> 806 	 qiann4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qiam2"> 807 	 qiam2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qia3"> 808 	 qia3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qia2"> 809 	 qia2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qen5"> 810 	 qen5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qe2"> 811 	 qe2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?qau2"> 812 	 qau2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?pue4"> 813 	 pue4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?pue3"> 814 	 pue3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?pue2"> 815 	 pue2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?puann2"> 816 	 puann2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?pong2"> 817 	 pong2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ping2"> 818 	 ping2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?pau3"> 819 	 pau3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?pang5"> 820 	 pang5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?pang1"> 821 	 pang1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?painn4"> 822 	 painn4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?pai3"> 823 	 pai3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ong5"> 824 	 ong5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ong4"> 825 	 ong4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?o4"> 826 	 o4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?o"> 827 	 o  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?nqo4"> 828 	 nqo4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?nqo3"> 829 	 nqo3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?nqo2"> 830 	 nqo2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?niu5"> 831 	 niu5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?nih2"> 832 	 nih2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?nia3"> 833 	 nia3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ngh2"> 834 	 ngh2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ne3"> 835 	 ne3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?nau4"> 836 	 nau4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?nau3"> 837 	 nau3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mui1"> 838 	 mui1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mng5"> 839 	 mng5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mng3"> 840 	 mng3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mih2"> 841 	 mih2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mia5"> 842 	 mia5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mh1"> 843 	 mh1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?mau2"> 844 	 mau2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?m1"> 845 	 m1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lueh2"> 846 	 lueh2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?luan4"> 847 	 luan4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?luai4"> 848 	 luai4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?luai3"> 849 	 luai3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lua3"> 850 	 lua3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lorh3"> 851 	 lorh3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lorh2"> 852 	 lorh2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lor2"> 853 	 lor2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lok1"> 854 	 lok1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?loh3"> 855 	 loh3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lo3"> 856 	 lo3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?liu1"> 857 	 liu1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ling3"> 858 	 ling3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lik3"> 859 	 lik3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lih3"> 860 	 lih3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lih2"> 861 	 lih2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lih1"> 862 	 lih1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?liau2"> 863 	 liau2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?liap3"> 864 	 liap3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?liap1"> 865 	 liap1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?liam3"> 866 	 liam3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lia2"> 867 	 lia2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?len3"> 868 	 len3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?le5"> 869 	 le5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?le4"> 870 	 le4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lat2"> 871 	 lat2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lang1"> 872 	 lang1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lam5"> 873 	 lam5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lam3"> 874 	 lam3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lam2"> 875 	 lam2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?lak2"> 876 	 lak2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?laim3"> 877 	 laim3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?la4"> 878 	 la4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kuinn4"> 879 	 kuinn4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kuann2"> 880 	 kuann2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kuan2"> 881 	 kuan2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kuan1"> 882 	 kuan1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kuainn5"> 883 	 kuainn5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kuainn4"> 884 	 kuainn4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kuainn3"> 885 	 kuainn3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kuai3"> 886 	 kuai3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ku2"> 887 	 ku2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ku1"> 888 	 ku1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kong4"> 889 	 kong4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kong1"> 890 	 kong1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kit1"> 891 	 kit1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?king3"> 892 	 king3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?king"> 893 	 king  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kin1"> 894 	 kin1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kiau4"> 895 	 kiau4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kiang4"> 896 	 kiang4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kiam3"> 897 	 kiam3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kiam2"> 898 	 kiam2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kiai4"> 899 	 kiai4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kia2"> 900 	 kia2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ki2"> 901 	 ki2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ke3"> 902 	 ke3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?kah2"> 903 	 kah2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ka4"> 904 	 ka4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iorh1"> 905 	 iorh1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iong5"> 906 	 iong5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?inn2"> 907 	 inn2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?iah3"> 908 	 iah3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hui4"> 909 	 hui4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?huat3"> 910 	 huat3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?huah2"> 911 	 huah2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hu1"> 912 	 hu1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?honnh5"> 913 	 honnh5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?honn4"> 914 	 honn4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hong5"> 915 	 hong5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hok3"> 916 	 hok3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ho5"> 917 	 ho5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ho1"> 918 	 ho1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hng2"> 919 	 hng2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hmh5"> 920 	 hmh5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hiong4"> 921 	 hiong4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hiong3"> 922 	 hiong3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hiong1"> 923 	 hiong1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hing2"> 924 	 hing2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?him2"> 925 	 him2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hiang1"> 926 	 hiang1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hiam2"> 927 	 hiam2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hennh3"> 928 	 hennh3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?henn3"> 929 	 henn3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?henn2"> 930 	 henn2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hen5"> 931 	 hen5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hen2"> 932 	 hen2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hau4"> 933 	 hau4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hann5"> 934 	 hann5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hann4"> 935 	 hann4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?han2"> 936 	 han2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ham3"> 937 	 ham3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?hah2"> 938 	 hah2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ha2"> 939 	 ha2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gun2"> 940 	 gun2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gui3"> 941 	 gui3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?guat1"> 942 	 guat1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?guann2"> 943 	 guann2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?guann1"> 944 	 guann1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?guai3"> 945 	 guai3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?guah1"> 946 	 guah1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gu2"> 947 	 gu2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gu1"> 948 	 gu1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gorh"> 949 	 gorh  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gor2"> 950 	 gor2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?go2"> 951 	 go2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?go1"> 952 	 go1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gng4"> 953 	 gng4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gng1"> 954 	 gng1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gip2"> 955 	 gip2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gip1"> 956 	 gip1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?giong5"> 957 	 giong5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?giong4"> 958 	 giong4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ginn4"> 959 	 ginn4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ging5"> 960 	 ging5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gik2"> 961 	 gik2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?giann1"> 962 	 giann1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?get2"> 963 	 get2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gen3"> 964 	 gen3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gen2"> 965 	 gen2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gann4"> 966 	 gann4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gang4"> 967 	 gang4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?gam2"> 968 	 gam2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ga1"> 969 	 ga1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?eh5"> 970 	 eh5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dun1"> 971 	 dun1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dui2"> 972 	 dui2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dueh2"> 973 	 dueh2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?due4"> 974 	 due4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dong1"> 975 	 dong1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dit2"> 976 	 dit2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ding5"> 977 	 ding5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?din4"> 978 	 din4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?din3"> 979 	 din3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dik3"> 980 	 dik3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dik2"> 981 	 dik2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dik1"> 982 	 dik1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dih1"> 983 	 dih1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?diam2"> 984 	 diam2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?de"> 985 	 de  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dann4"> 986 	 dann4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dann3"> 987 	 dann3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dan5"> 988 	 dan5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dam1"> 989 	 dam1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?dah2"> 990 	 dah2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?da3"> 991 	 da3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?da2"> 992 	 da2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cut3"> 993 	 cut3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cua2"> 994 	 cua2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cu1"> 995 	 cu1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cor3"> 996 	 cor3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cong4"> 997 	 cong4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?co2"> 998 	 co2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?co1"> 999 	 co1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ciorh3"> 1000 	 ciorh3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cior4"> 1001 	 cior4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cior3"> 1002 	 cior3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ciong3"> 1003 	 ciong3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cinn4"> 1004 	 cinn4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cinn2"> 1005 	 cinn2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cing3"> 1006 	 cing3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ciah2"> 1007 	 ciah2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ci5"> 1008 	 ci5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ci4"> 1009 	 ci4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ci3"> 1010 	 ci3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cet1"> 1011 	 cet1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cenn2"> 1012 	 cenn2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cen2"> 1013 	 cen2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cap2"> 1014 	 cap2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?cam2"> 1015 	 cam2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ca1"> 1016 	 ca1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bun2"> 1017 	 bun2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bor5"> 1018 	 bor5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bor2"> 1019 	 bor2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bo1"> 1020 	 bo1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bng4"> 1021 	 bng4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bit3"> 1022 	 bit3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bing5"> 1023 	 bing5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bing2"> 1024 	 bing2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bik1"> 1025 	 bik1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?biah2"> 1026 	 biah2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bi4"> 1027 	 bi4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bi2"> 1028 	 bi2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?benn3"> 1029 	 benn3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?be4"> 1030 	 be4  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?be3"> 1031 	 be3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?be2"> 1032 	 be2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bau"> 1033 	 bau  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bak3"> 1034 	 bak3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bai5"> 1035 	 bai5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bah3"> 1036 	 bah3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?bah1"> 1037 	 bah1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ap1"> 1038 	 ap1  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ang3"> 1039 	 ang3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?an5"> 1040 	 an5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?an3"> 1041 	 an3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?aih3"> 1042 	 aih3  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?ai2"> 1043 	 ai2  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?a5"> 1044 	 a5  :  1 </a>
<a href="http://140.109.18.117/download_page/serachfile.html?a11"> 1045 	 a11  :  1 </a>
</pre>
</body>
