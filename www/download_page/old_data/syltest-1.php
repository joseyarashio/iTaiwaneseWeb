<!doctype html>
<head>
<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="../js/raphael.js"></script>
<script type="text/javascript" src="../js/morris.js"></script>
<style type="text/css"> 
pre {
  height: 300px;
  overflow: auto;
}
</style> 
<?php
if($_POST["sub"]=="篩選"){
	$item2 = $_POST ["item1"].$_POST ["item2"];
	$aCommand= 'c:/Python33/python.exe C:/AppServ/www/download_page/syllable.py '.$_POST ["item3"].' - '.$item2;
	$aReturn= system($aCommand);
	echo $aCommand;
	echo $aReturn;
	}
?>
<form method="post" name="myform">
		篩選<br>韻母:
		<select size="1" name="item1" id="sysearch">
			<option value="all">-單韻母-</option>
			<option value="a">a</option>
			<option value="i">i</option>
			<option value="u">u</option>
			<option value="e">e</option>
			<option value="er">er</option>
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
			<option value="50">50</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
		</select>
		<input name="sub" type="submit" value="篩選"><br>
		<div id="Bar"></div>
		
	</form>
<body>
	<script type="text/javascript">
	$(function(){
		var data =[
			{"syllable": " a2 ","number": 474 },
			{"syllable": " li1 ","number": 373 },
			{"syllable": " la3 ","number": 321 },
			{"syllable": " qua1 ","number": 299 },
			{"syllable": " e3 ","number": 284 },
			{"syllable": " a3 ","number": 247 },
			{"syllable": " si3 ","number": 239 },
			{"syllable": " hor4 ","number": 191 },
			{"syllable": " e2 ","number": 189 },
			{"syllable": " honnh2 ","number": 184 },
			{"syllable": " vu4 ","number": 162 },
			{"syllable": " ah1 ","number": 151 },
			{"syllable": " oh2 ","number": 131 },
			{"syllable": " u3 ","number": 124 },
			{"syllable": " m3 ","number": 124 },
			{"syllable": " gorh1 ","number": 122 },
			{"syllable": " lai5 ","number": 110 },
			{"syllable": " zit3 ","number": 108 },
			{"syllable": " a1 ","number": 108 },
			{"syllable": " i2 ","number": 99 },
			{"syllable": " vor2 ","number": 98 },
			{"syllable": " dor3 ","number": 96 },
			{"syllable": " an1 ","number": 95 },
			{"syllable": " lai2 ","number": 91 },
			{"syllable": " ki1 ","number": 90 },
			{"syllable": " ai4 ","number": 88 },
			{"syllable": " veh1 ","number": 87 },
			{"syllable": " ve3 ","number": 85 },
			{"syllable": " ziah1 ","number": 78 },
			{"syllable": " ki3 ","number": 78 },
			{"syllable": " lin1 ","number": 74 },
			{"syllable": " gong1 ","number": 71 },
			{"syllable": " ziok1 ","number": 70 },
			{"syllable": " ma3 ","number": 70 },
			{"syllable": " vor3 ","number": 69 },
			{"syllable": " long1 ","number": 66 },
			{"syllable": " hor1 ","number": 65 },
			{"syllable": " zit1 ","number": 63 },
			{"syllable": " neh2 ","number": 62 },
			{"syllable": " ne1 ","number": 62 },
			{"syllable": " ga3 ","number": 62 },
			{"syllable": " bah2 ","number": 61 },
			{"syllable": " a4 ","number": 60 },
			{"syllable": " kuann4 ","number": 58 },
			{"syllable": " gah1 ","number": 58 },
			{"syllable": " lan1 ","number": 57 },
			{"syllable": " kah1 ","number": 55 },
			{"syllable": " ze1 ","number": 51 },
			{"syllable": " oh3 ","number": 51 },
			{"syllable": " zin2 ","number": 50 },
			{"syllable": " ho3 ","number": 50 },
			{"syllable": " e1 ","number": 50 },
			{"syllable": " ziah3 ","number": 49 },
			{"syllable": " mai4 ","number": 49 },
			{"syllable": " li3 ","number": 49 },
			{"syllable": " na3 ","number": 48 },
			{"syllable": " gong4 ","number": 48 },
			{"syllable": " zu4 ","number": 45 },
			{"syllable": " zor4 ","number": 45 },
			{"syllable": " siunn3 ","number": 44 },
			{"syllable": " lai3 ","number": 44 },
			{"syllable": " na4 ","number": 43 },
			{"syllable": " zinn5 ","number": 42 },
			{"syllable": " zi4 ","number": 42 },
			{"syllable": " gam1 ","number": 41 },
			{"syllable": " li4 ","number": 40 },
			{"syllable": " dai3 ","number": 40 },
			{"syllable": " zai2 ","number": 39 },
			{"syllable": " sing2 ","number": 38 },
			{"syllable": " gin1 ","number": 38 },
			{"syllable": " diorh2 ","number": 38 },
			{"syllable": " ziah2 ","number": 37 },
			{"syllable": " o3 ","number": 37 },
			{"syllable": " mui2 ","number": 37 },
			{"syllable": " ga2 ","number": 36 },
			{"syllable": " zi3 ","number": 35 },
			{"syllable": " dor2 ","number": 35 },
			{"syllable": " diorh3 ","number": 35 },
			{"syllable": " di3 ","number": 34 },
			{"syllable": " he1 ","number": 33 },
			{"syllable": " it1 ","number": 32 },
			{"syllable": " dng4 ","number": 32 },
			{"syllable": " o2 ","number": 31 },
			{"syllable": " leh1 ","number": 31 },
			{"syllable": " gor1 ","number": 31 },
			{"syllable": " si2 ","number": 30 },
			{"syllable": " lang5 ","number": 30 },
			{"syllable": " i1 ","number": 30 },
			{"syllable": " ah2 ","number": 30 },
			{"syllable": " zu1 ","number": 29 },
			{"syllable": " siann1 ","number": 28 },
			{"syllable": " se4 ","number": 28 },
			{"syllable": " gin4 ","number": 28 },
			{"syllable": " ge1 ","number": 28 },
			{"syllable": " di2 ","number": 28 },
			{"syllable": " zing3 ","number": 27 },
			{"syllable": " zia1 ","number": 27 },
			{"syllable": " tak3 ","number": 27 },
			{"syllable": " qua3 ","number": 27 },
			{"syllable": " ma4 ","number": 27 },
			{"syllable": " hui2 ","number": 27 },
			{"syllable": " eh2 ","number": 27 },
			{"syllable": " dau4 ","number": 27 },
			{"syllable": " qun1 ","number": 26 },
			{"syllable": " le2 ","number": 26 },
			{"syllable": " kuann3 ","number": 26 },
			{"syllable": " dua3 ","number": 26 },
			{"syllable": " dang4 ","number": 26 },
			{"syllable": " dak3 ","number": 26 },
			{"syllable": " guai1 ","number": 25 },
			{"syllable": " dior3 ","number": 25 },
			{"syllable": " zai1 ","number": 24 },
			{"syllable": " sui4 ","number": 24 },
			{"syllable": " mih1 ","number": 24 },
			{"syllable": " lang2 ","number": 24 },
			{"syllable": " ge2 ","number": 24 },
			{"syllable": " ziann2 ","number": 23 },
			{"syllable": " ze2 ","number": 23 },
			{"syllable": " ui3 ","number": 23 },
			{"syllable": " huat1 ","number": 23 },
			{"syllable": " han2 ","number": 23 },
			{"syllable": " gang2 ","number": 23 },
			{"syllable": " zi5 ","number": 22 },
			{"syllable": " vor5 ","number": 22 },
			{"syllable": " sim1 ","number": 22 },
			{"syllable": " in2 ","number": 22 },
			{"syllable": " hok2 ","number": 22 },
			{"syllable": " ho2 ","number": 22 },
			{"syllable": " hak3 ","number": 22 },
			{"syllable": " cai3 ","number": 22 },
			{"syllable": " ue2 ","number": 21 },
			{"syllable": " u2 ","number": 21 },
			{"syllable": " sin2 ","number": 21 },
			{"syllable": " len5 ","number": 21 },
			{"syllable": " le3 ","number": 21 },
			{"syllable": " dui4 ","number": 21 },
			{"syllable": " qin1 ","number": 20 },
			{"syllable": " mai2 ","number": 20 },
			{"syllable": " hannh2 ","number": 20 },
			{"syllable": " gior4 ","number": 20 },
			{"syllable": " ge3 ","number": 20 },
			{"syllable": " dor4 ","number": 20 },
			{"syllable": " ding3 ","number": 20 },
			{"syllable": " dang2 ","number": 20 },
			{"syllable": " za2 ","number": 19 },
			{"syllable": " tau2 ","number": 19 },
			{"syllable": " na1 ","number": 19 },
			{"syllable": " mh2 ","number": 19 },
			{"syllable": " liau4 ","number": 19 },
			{"syllable": " iau4 ","number": 19 },
			{"syllable": " i4 ","number": 19 },
			{"syllable": " hau2 ","number": 19 },
			{"syllable": " giann2 ","number": 19 },
			{"syllable": " gi2 ","number": 19 },
			{"syllable": " dan4 ","number": 19 },
			{"syllable": " vi1 ","number": 18 },
			{"syllable": " ven1 ","number": 18 },
			{"syllable": " sit3 ","number": 18 },
			{"syllable": " siong3 ","number": 18 },
			{"syllable": " o1 ","number": 18 },
			{"syllable": " lu1 ","number": 18 },
			{"syllable": " li2 ","number": 18 },
			{"syllable": " kai4 ","number": 18 },
			{"syllable": " ka4 ","number": 18 },
			{"syllable": " huann2 ","number": 18 },
			{"syllable": " han3 ","number": 18 },
			{"syllable": " tiam2 ","number": 17 },
			{"syllable": " lor4 ","number": 17 },
			{"syllable": " liau1 ","number": 17 },
			{"syllable": " ko1 ","number": 17 },
			{"syllable": " ing2 ","number": 17 },
			{"syllable": " ging2 ","number": 17 },
			{"syllable": " giann4 ","number": 17 },
			{"syllable": " cu4 ","number": 17 },
			{"syllable": " zun2 ","number": 16 },
			{"syllable": " zor3 ","number": 16 },
			{"syllable": " zin1 ","number": 16 },
			{"syllable": " ziang3 ","number": 16 },
			{"syllable": " sior1 ","number": 16 },
			{"syllable": " sann2 ","number": 16 },
			{"syllable": " qo3 ","number": 16 },
			{"syllable": " iah1 ","number": 16 },
			{"syllable": " hi4 ","number": 16 },
			{"syllable": " gue4 ","number": 16 },
			{"syllable": " gin2 ","number": 16 },
			{"syllable": " dinn1 ","number": 16 },
			{"syllable": " dau1 ","number": 16 },
			{"syllable": " ciann1 ","number": 16 },
			{"syllable": " zuann4 ","number": 15 },
			{"syllable": " tau5 ","number": 15 },
			{"syllable": " so4 ","number": 15 },
			{"syllable": " ri2 ","number": 15 },
			{"syllable": " ko4 ","number": 15 },
			{"syllable": " giann5 ","number": 15 },
			{"syllable": " de4 ","number": 15 },
			{"syllable": " de3 ","number": 15 },
			{"syllable": " dan1 ","number": 15 },
			{"syllable": " bng2 ","number": 15 },
			{"syllable": " vai4 ","number": 14 },
			{"syllable": " tiann2 ","number": 14 },
			{"syllable": " te4 ","number": 14 },
			{"syllable": " sinn1 ","number": 14 },
			{"syllable": " sia2 ","number": 14 },
			{"syllable": " iann1 ","number": 14 },
			{"syllable": " gi3 ","number": 14 },
			{"syllable": " ge4 ","number": 14 },
			{"syllable": " gang1 ","number": 14 },
			{"syllable": " ceh2 ","number": 14 },
			{"syllable": " ai3 ","number": 14 },
			{"syllable": " ziann4 ","number": 13 },
			{"syllable": " zau4 ","number": 13 },
			{"syllable": " te3 ","number": 13 },
			{"syllable": " sun3 ","number": 13 },
			{"syllable": " su2 ","number": 13 },
			{"syllable": " sen2 ","number": 13 },
			{"syllable": " qua2 ","number": 13 },
			{"syllable": " meh2 ","number": 13 },
			{"syllable": " leh3 ","number": 13 },
			{"syllable": " iorh3 ","number": 13 },
			{"syllable": " hit1 ","number": 13 },
			{"syllable": " hiann1 ","number": 13 },
			{"syllable": " gau4 ","number": 13 },
			{"syllable": " gai4 ","number": 13 },
			{"syllable": " cut1 ","number": 13 },
			{"syllable": " cu3 ","number": 13 },
			{"syllable": " bau2 ","number": 13 },
			{"syllable": " aih2 ","number": 13 },
			{"syllable": " zu3 ","number": 12 },
			{"syllable": " ve2 ","number": 12 },
			{"syllable": " siong4 ","number": 12 },
			{"syllable": " siong1 ","number": 12 },
			{"syllable": " sia1 ","number": 12 },
			{"syllable": " sang3 ","number": 12 },
			{"syllable": " qua4 ","number": 12 },
			{"syllable": " nng3 ","number": 12 },
			{"syllable": " ni5 ","number": 12 },
			{"syllable": " nai4 ","number": 12 },
			{"syllable": " kau3 ","number": 12 },
			{"syllable": " iann4 ","number": 12 },
			{"syllable": " huan2 ","number": 12 },
			{"syllable": " hi2 ","number": 12 },
			{"syllable": " gau3 ","number": 12 },
			{"syllable": " cin1 ","number": 12 },
			{"syllable": " ban1 ","number": 12 },
			{"syllable": " zok1 ","number": 11 },
			{"syllable": " ze3 ","number": 11 },
			{"syllable": " vue4 ","number": 11 },
			{"syllable": " vue3 ","number": 11 },
			{"syllable": " ve1 ","number": 11 },
			{"syllable": " vang3 ","number": 11 },
			{"syllable": " siunn2 ","number": 11 },
			{"syllable": " siannh2 ","number": 11 },
			{"syllable": " si5 ","number": 11 },
			{"syllable": " kor1 ","number": 11 },
			{"syllable": " iong1 ","number": 11 },
			{"syllable": " ing5 ","number": 11 },
			{"syllable": " iau1 ","number": 11 },
			{"syllable": " i3 ","number": 11 },
			{"syllable": " ha3 ","number": 11 },
			{"syllable": " gu4 ","number": 11 },
			{"syllable": " go4 ","number": 11 },
			{"syllable": " e5 ","number": 11 },
			{"syllable": " dng1 ","number": 11 },
			{"syllable": " da4 ","number": 11 },
			{"syllable": " cun2 ","number": 11 },
			{"syllable": " cua3 ","number": 11 },
			{"syllable": " cing2 ","number": 11 },
			{"syllable": " ziau4 ","number": 10 },
			{"syllable": " za4 ","number": 10 },
			{"syllable": " quan2 ","number": 10 },
			{"syllable": " ni3 ","number": 10 },
			{"syllable": " kuai4 ","number": 10 },
			{"syllable": " kor3 ","number": 10 },
			{"syllable": " ing4 ","number": 10 },
			{"syllable": " guai2 ","number": 10 },
			{"syllable": " gong2 ","number": 10 },
			{"syllable": " gang3 ","number": 10 },
			{"syllable": " gan1 ","number": 10 },
			{"syllable": " zui1 ","number": 9 },
			{"syllable": " ziong2 ","number": 9 },
			{"syllable": " vo4 ","number": 9 },
			{"syllable": " vin2 ","number": 9 },
			{"syllable": " so1 ","number": 9 },
			{"syllable": " sit2 ","number": 9 },
			{"syllable": " sim2 ","number": 9 },
			{"syllable": " sang1 ","number": 9 },
			{"syllable": " na2 ","number": 9 },
			{"syllable": " me2 ","number": 9 },
			{"syllable": " lau2 ","number": 9 },
			{"syllable": " huat2 ","number": 9 },
			{"syllable": " hong4 ","number": 9 },
			{"syllable": " gan2 ","number": 9 },
			{"syllable": " gak1 ","number": 9 },
			{"syllable": " ga4 ","number": 9 },
			{"syllable": " cue2 ","number": 9 },
			{"syllable": " cai4 ","number": 9 },
			{"syllable": " beh2 ","number": 9 },
			{"syllable": " au2 ","number": 9 },
			{"syllable": " zing5 ","number": 8 },
			{"syllable": " vuai5 ","number": 8 },
			{"syllable": " vo1 ","number": 8 },
			{"syllable": " ui2 ","number": 8 },
			{"syllable": " u1 ","number": 8 },
			{"syllable": " tan4 ","number": 8 },
			{"syllable": " su1 ","number": 8 },
			{"syllable": " siu1 ","number": 8 },
			{"syllable": " si4 ","number": 8 },
			{"syllable": " senn2 ","number": 8 },
			{"syllable": " se3 ","number": 8 },
			{"syllable": " sann1 ","number": 8 },
			{"syllable": " sang4 ","number": 8 },
			{"syllable": " mih3 ","number": 8 },
			{"syllable": " lin2 ","number": 8 },
			{"syllable": " lau3 ","number": 8 },
			{"syllable": " la2 ","number": 8 },
			{"syllable": " kuan4 ","number": 8 },
			{"syllable": " i5 ","number": 8 },
			{"syllable": " hun2 ","number": 8 },
			{"syllable": " hue3 ","number": 8 },
			{"syllable": " hia1 ","number": 8 },
			{"syllable": " gui1 ","number": 8 },
			{"syllable": " gue3 ","number": 8 },
			{"syllable": " guann1 ","number": 8 },
			{"syllable": " guan2 ","number": 8 },
			{"syllable": " ga5 ","number": 8 },
			{"syllable": " du1 ","number": 8 },
			{"syllable": " dor1 ","number": 8 },
			{"syllable": " dong2 ","number": 8 },
			{"syllable": " dng3 ","number": 8 },
			{"syllable": " dit3 ","number": 8 },
			{"syllable": " cue3 ","number": 8 },
			{"syllable": " bai4 ","number": 8 },
			{"syllable": " zui4 ","number": 7 },
			{"syllable": " zap3 ","number": 7 },
			{"syllable": " vue1 ","number": 7 },
			{"syllable": " van3 ","number": 7 },
			{"syllable": " su3 ","number": 7 },
			{"syllable": " siu2 ","number": 7 },
			{"syllable": " sit1 ","number": 7 },
			{"syllable": " siorh2 ","number": 7 },
			{"syllable": " sin1 ","number": 7 },
			{"syllable": " sia4 ","number": 7 },
			{"syllable": " sannh2 ","number": 7 },
			{"syllable": " painn1 ","number": 7 },
			{"syllable": " ni2 ","number": 7 },
			{"syllable": " mng2 ","number": 7 },
			{"syllable": " lit2 ","number": 7 },
			{"syllable": " lia3 ","number": 7 },
			{"syllable": " len2 ","number": 7 },
			{"syllable": " lang3 ","number": 7 },
			{"syllable": " kor4 ","number": 7 },
			{"syllable": " kang2 ","number": 7 },
			{"syllable": " iong3 ","number": 7 },
			{"syllable": " hun4 ","number": 7 },
			{"syllable": " hue1 ","number": 7 },
			{"syllable": " hau3 ","number": 7 },
			{"syllable": " hann5 ","number": 7 },
			{"syllable": " hai2 ","number": 7 },
			{"syllable": " ging1 ","number": 7 },
			{"syllable": " gai2 ","number": 7 },
			{"syllable": " do2 ","number": 7 },
			{"syllable": " dng2 ","number": 7 },
			{"syllable": " cun1 ","number": 7 },
			{"syllable": " but1 ","number": 7 },
			{"syllable": " binn1 ","number": 7 },
			{"syllable": " bi1 ","number": 7 },
			{"syllable": " ban3 ","number": 7 },
			{"syllable": " ba4 ","number": 7 },
			{"syllable": " ang2 ","number": 7 },
			{"syllable": " an2 ","number": 7 },
			{"syllable": " zing4 ","number": 6 },
			{"syllable": " za1 ","number": 6 },
			{"syllable": " uann3 ","number": 6 },
			{"syllable": " uah2 ","number": 6 },
			{"syllable": " tiann3 ","number": 6 },
			{"syllable": " tiann1 ","number": 6 },
			{"syllable": " or2 ","number": 6 },
			{"syllable": " me5 ","number": 6 },
			{"syllable": " ma1 ","number": 6 },
			{"syllable": " leh2 ","number": 6 },
			{"syllable": " le1 ","number": 6 },
			{"syllable": " kun3 ","number": 6 },
			{"syllable": " kue3 ","number": 6 },
			{"syllable": " kng4 ","number": 6 },
			{"syllable": " king1 ","number": 6 },
			{"syllable": " iong2 ","number": 6 },
			{"syllable": " huah2 ","number": 6 },
			{"syllable": " hior4 ","number": 6 },
			{"syllable": " hiah1 ","number": 6 },
			{"syllable": " hang2 ","number": 6 },
			{"syllable": " ha1 ","number": 6 },
			{"syllable": " guan3 ","number": 6 },
			{"syllable": " gua1 ","number": 6 },
			{"syllable": " ging4 ","number": 6 },
			{"syllable": " gi4 ","number": 6 },
			{"syllable": " din2 ","number": 6 },
			{"syllable": " cinn1 ","number": 6 },
			{"syllable": " cia4 ","number": 6 },
			{"syllable": " can2 ","number": 6 },
			{"syllable": " ca1 ","number": 6 },
			{"syllable": " benn2 ","number": 6 },
			{"syllable": " ben3 ","number": 6 },
			{"syllable": " be2 ","number": 6 },
			{"syllable": " bau1 ","number": 6 },
			{"syllable": " bat3 ","number": 6 },
			{"syllable": " bang4 ","number": 6 },
			{"syllable": " zin4 ","number": 5 },
			{"syllable": " zik2 ","number": 5 },
			{"syllable": " zi1 ","number": 5 },
			{"syllable": " zau5 ","number": 5 },
			{"syllable": " zai3 ","number": 5 },
			{"syllable": " vo3 ","number": 5 },
			{"syllable": " ven4 ","number": 5 },
			{"syllable": " ve4 ","number": 5 },
			{"syllable": " vat3 ","number": 5 },
			{"syllable": " van2 ","number": 5 },
			{"syllable": " tiam1 ","number": 5 },
			{"syllable": " tang2 ","number": 5 },
			{"syllable": " sui2 ","number": 5 },
			{"syllable": " siu3 ","number": 5 },
			{"syllable": " sing1 ","number": 5 },
			{"syllable": " sin4 ","number": 5 },
			{"syllable": " ri3 ","number": 5 },
			{"syllable": " quat3 ","number": 5 },
			{"syllable": " quan1 ","number": 5 },
			{"syllable": " pen2 ","number": 5 },
			{"syllable": " pa4 ","number": 5 },
			{"syllable": " orh1 ","number": 5 },
			{"syllable": " nua4 ","number": 5 },
			{"syllable": " ne2 ","number": 5 },
			{"syllable": " ma2 ","number": 5 },
			{"syllable": " lo5 ","number": 5 },
			{"syllable": " lik2 ","number": 5 },
			{"syllable": " liam2 ","number": 5 },
			{"syllable": " kui2 ","number": 5 },
			{"syllable": " kiai3 ","number": 5 },
			{"syllable": " kau4 ","number": 5 },
			{"syllable": " ka2 ","number": 5 },
			{"syllable": " ka1 ","number": 5 },
			{"syllable": " iorh2 ","number": 5 },
			{"syllable": " ior1 ","number": 5 },
			{"syllable": " in1 ","number": 5 },
			{"syllable": " iau3 ","number": 5 },
			{"syllable": " ia3 ","number": 5 },
			{"syllable": " hue2 ","number": 5 },
			{"syllable": " huan5 ","number": 5 },
			{"syllable": " hiorh2 ","number": 5 },
			{"syllable": " hiau1 ","number": 5 },
			{"syllable": " hi1 ","number": 5 },
			{"syllable": " han4 ","number": 5 },
			{"syllable": " gui2 ","number": 5 },
			{"syllable": " gua3 ","number": 5 },
			{"syllable": " gor4 ","number": 5 },
			{"syllable": " gai1 ","number": 5 },
			{"syllable": " eh3 ","number": 5 },
			{"syllable": " ding4 ","number": 5 },
			{"syllable": " diam4 ","number": 5 },
			{"syllable": " diam1 ","number": 5 },
			{"syllable": " deh1 ","number": 5 },
			{"syllable": " de5 ","number": 5 },
			{"syllable": " de2 ","number": 5 },
			{"syllable": " dau2 ","number": 5 },
			{"syllable": " dann1 ","number": 5 },
			{"syllable": " cui3 ","number": 5 },
			{"syllable": " cor4 ","number": 5 },
			{"syllable": " ciunn3 ","number": 5 },
			{"syllable": " cin2 ","number": 5 },
			{"syllable": " ci2 ","number": 5 },
			{"syllable": " ca2 ","number": 5 },
			{"syllable": " bit2 ","number": 5 },
			{"syllable": " bin1 ","number": 5 },
			{"syllable": " bang2 ","number": 5 },
			{"syllable": " bak2 ","number": 5 },
			{"syllable": " bak1 ","number": 5 },
			{"syllable": " am4 ","number": 5 },
			{"syllable": " ziu1 ","number": 4 },
			{"syllable": " zin3 ","number": 4 },
			{"syllable": " zia4 ","number": 4 },
			{"syllable": " zai4 ","number": 4 },
			{"syllable": " vi2 ","number": 4 },
			{"syllable": " ui4 ","number": 4 },
			{"syllable": " tua2 ","number": 4 },
			{"syllable": " tok2 ","number": 4 },
			{"syllable": " tiau2 ","number": 4 },
			{"syllable": " siong2 ","number": 4 },
			{"syllable": " siok3 ","number": 4 },
			{"syllable": " siann4 ","number": 4 },
			{"syllable": " sia3 ","number": 4 },
			{"syllable": " senn1 ","number": 4 },
			{"syllable": " sai3 ","number": 4 },
			{"syllable": " ren5 ","number": 4 },
			{"syllable": " pue2 ","number": 4 },
			{"syllable": " oh1 ","number": 4 },
			{"syllable": " mui3 ","number": 4 },
			{"syllable": " mi4 ","number": 4 },
			{"syllable": " m4 ","number": 4 },
			{"syllable": " lorh3 ","number": 4 },
			{"syllable": " lo2 ","number": 4 },
			{"syllable": " lit3 ","number": 4 },
			{"syllable": " lip2 ","number": 4 },
			{"syllable": " liong2 ","number": 4 },
			{"syllable": " lin4 ","number": 4 },
			{"syllable": " lin3 ","number": 4 },
			{"syllable": " lim1 ","number": 4 },
			{"syllable": " liap2 ","number": 4 },
			{"syllable": " li ","number": 4 },
			{"syllable": " kui1 ","number": 4 },
			{"syllable": " koh2 ","number": 4 },
			{"syllable": " kng3 ","number": 4 },
			{"syllable": " ki4 ","number": 4 },
			{"syllable": " kai2 ","number": 4 },
			{"syllable": " iu2 ","number": 4 },
			{"syllable": " ior3 ","number": 4 },
			{"syllable": " ing1 ","number": 4 },
			{"syllable": " hui3 ","number": 4 },
			{"syllable": " hue4 ","number": 4 },
			{"syllable": " hennh2 ","number": 4 },
			{"syllable": " hah1 ","number": 4 },
			{"syllable": " guan1 ","number": 4 },
			{"syllable": " guai4 ","number": 4 },
			{"syllable": " giong2 ","number": 4 },
			{"syllable": " ging3 ","number": 4 },
			{"syllable": " gau1 ","number": 4 },
			{"syllable": " dong3 ","number": 4 },
			{"syllable": " dong1 ","number": 4 },
			{"syllable": " do4 ","number": 4 },
			{"syllable": " diong3 ","number": 4 },
			{"syllable": " ding1 ","number": 4 },
			{"syllable": " diau5 ","number": 4 },
			{"syllable": " diann3 ","number": 4 },
			{"syllable": " dam3 ","number": 4 },
			{"syllable": " dam2 ","number": 4 },
			{"syllable": " dai2 ","number": 4 },
			{"syllable": " cut2 ","number": 4 },
			{"syllable": " ciu4 ","number": 4 },
			{"syllable": " ce2 ","number": 4 },
			{"syllable": " cang2 ","number": 4 },
			{"syllable": " buann2 ","number": 4 },
			{"syllable": " bo2 ","number": 4 },
			{"syllable": " biau1 ","number": 4 },
			{"syllable": " beh3 ","number": 4 },
			{"syllable": " bat1 ","number": 4 },
			{"syllable": " bai3 ","number": 4 },
			{"syllable": " am3 ","number": 4 },
			{"syllable": " zue4 ","number": 3 },
			{"syllable": " zior4 ","number": 3 },
			{"syllable": " ziong3 ","number": 3 },
			{"syllable": " zing2 ","number": 3 },
			{"syllable": " zim4 ","number": 3 },
			{"syllable": " vok3 ","number": 3 },
			{"syllable": " ving2 ","number": 3 },
			{"syllable": " vi3 ","number": 3 },
			{"syllable": " vat2 ","number": 3 },
			{"syllable": " vat1 ","number": 3 },
			{"syllable": " un3 ","number": 3 },
			{"syllable": " un2 ","number": 3 },
			{"syllable": " un1 ","number": 3 },
			{"syllable": " uan5 ","number": 3 },
			{"syllable": " uan4 ","number": 3 },
			{"syllable": " tng5 ","number": 3 },
			{"syllable": " tinn2 ","number": 3 },
			{"syllable": " sng4 ","number": 3 },
			{"syllable": " sng3 ","number": 3 },
			{"syllable": " sior4 ","number": 3 },
			{"syllable": " sior2 ","number": 3 },
			{"syllable": " sing4 ","number": 3 },
			{"syllable": " siau4 ","number": 3 },
			{"syllable": " senn4 ","number": 3 },
			{"syllable": " se1 ","number": 3 },
			{"syllable": " sai2 ","number": 3 },
			{"syllable": " sai1 ","number": 3 },
			{"syllable": " qo2 ","number": 3 },
			{"syllable": " qiap2 ","number": 3 },
			{"syllable": " qau5 ","number": 3 },
			{"syllable": " pue1 ","number": 3 },
			{"syllable": " pang2 ","number": 3 },
			{"syllable": " pai1 ","number": 3 },
			{"syllable": " orh3 ","number": 3 },
			{"syllable": " ong5 ","number": 3 },
			{"syllable": " nng2 ","number": 3 },
			{"syllable": " mng3 ","number": 3 },
			{"syllable": " me1 ","number": 3 },
			{"syllable": " m5 ","number": 3 },
			{"syllable": " lor3 ","number": 3 },
			{"syllable": " liorh2 ","number": 3 },
			{"syllable": " lim2 ","number": 3 },
			{"syllable": " liap3 ","number": 3 },
			{"syllable": " lia1 ","number": 3 },
			{"syllable": " len3 ","number": 3 },
			{"syllable": " lau1 ","number": 3 },
			{"syllable": " lan5 ","number": 3 },
			{"syllable": " laih2 ","number": 3 },
			{"syllable": " kun4 ","number": 3 },
			{"syllable": " kit3 ","number": 3 },
			{"syllable": " kit2 ","number": 3 },
			{"syllable": " kin2 ","number": 3 },
			{"syllable": " iu5 ","number": 3 },
			{"syllable": " iu1 ","number": 3 },
			{"syllable": " ing3 ","number": 3 },
			{"syllable": " hun1 ","number": 3 },
			{"syllable": " hua5 ","number": 3 },
			{"syllable": " hua4 ","number": 3 },
			{"syllable": " honnh3 ","number": 3 },
			{"syllable": " hioh2 ","number": 3 },
			{"syllable": " hing5 ","number": 3 },
			{"syllable": " hing4 ","number": 3 },
			{"syllable": " he2 ","number": 3 },
			{"syllable": " hang3 ","number": 3 },
			{"syllable": " hai4 ","number": 3 },
			{"syllable": " gut1 ","number": 3 },
			{"syllable": " guan5 ","number": 3 },
			{"syllable": " go3 ","number": 3 },
			{"syllable": " gior3 ","number": 3 },
			{"syllable": " giam1 ","number": 3 },
			{"syllable": " gi1 ","number": 3 },
			{"syllable": " gen4 ","number": 3 },
			{"syllable": " gau2 ","number": 3 },
			{"syllable": " gann1 ","number": 3 },
			{"syllable": " gam4 ","number": 3 },
			{"syllable": " en5 ","number": 3 },
			{"syllable": " en2 ","number": 3 },
			{"syllable": " eh1 ","number": 3 },
			{"syllable": " duann1 ","number": 3 },
			{"syllable": " dorh2 ","number": 3 },
			{"syllable": " dngh2 ","number": 3 },
			{"syllable": " diu2 ","number": 3 },
			{"syllable": " diong1 ","number": 3 },
			{"syllable": " dinn2 ","number": 3 },
			{"syllable": " ding2 ","number": 3 },
			{"syllable": " diau2 ","number": 3 },
			{"syllable": " di1 ","number": 3 },
			{"syllable": " dau3 ","number": 3 },
			{"syllable": " dann4 ","number": 3 },
			{"syllable": " cong4 ","number": 3 },
			{"syllable": " ciu1 ","number": 3 },
			{"syllable": " cenn2 ","number": 3 },
			{"syllable": " bun1 ","number": 3 },
			{"syllable": " buat3 ","number": 3 },
			{"syllable": " bua3 ","number": 3 },
			{"syllable": " bu2 ","number": 3 },
			{"syllable": " bo3 ","number": 3 },
			{"syllable": " bai2 ","number": 3 },
			{"syllable": " au3 ","number": 3 },
			{"syllable": " ang1 ","number": 3 },
			{"syllable": " ai2 ","number": 3 },
			{"syllable": " ah3 ","number": 3 },
			{"syllable": " a5 ","number": 3 },
			{"syllable": " zun1 ","number": 2 },
			{"syllable": " zue2 ","number": 2 },
			{"syllable": " zuat3 ","number": 2 },
			{"syllable": " zuan2 ","number": 2 },
			{"syllable": " zong4 ","number": 2 },
			{"syllable": " zng1 ","number": 2 },
			{"syllable": " ziu4 ","number": 2 },
			{"syllable": " zit ","number": 2 },
			{"syllable": " ziong4 ","number": 2 },
			{"syllable": " ziong1 ","number": 2 },
			{"syllable": " zing1 ","number": 2 },
			{"syllable": " zik1 ","number": 2 },
			{"syllable": " ze4 ","number": 2 },
			{"syllable": " zau2 ","number": 2 },
			{"syllable": " zat3 ","number": 2 },
			{"syllable": " zam2 ","number": 2 },
			{"syllable": " zah1 ","number": 2 },
			{"syllable": " za5 ","number": 2 },
			{"syllable": " vun5 ","number": 2 },
			{"syllable": " vue2 ","number": 2 },
			{"syllable": " vong2 ","number": 2 },
			{"syllable": " vin3 ","number": 2 },
			{"syllable": " vang2 ","number": 2 },
			{"syllable": " vai3 ","number": 2 },
			{"syllable": " vai2 ","number": 2 },
			{"syllable": " uann1 ","number": 2 },
			{"syllable": " uan2 ","number": 2 },
			{"syllable": " uah1 ","number": 2 },
			{"syllable": " tuan5 ","number": 2 },
			{"syllable": " tng1 ","number": 2 },
			{"syllable": " tinn1 ","number": 2 },
			{"syllable": " tiann4 ","number": 2 },
			{"syllable": " tiam4 ","number": 2 },
			{"syllable": " te2 ","number": 2 },
			{"syllable": " te1 ","number": 2 },
			{"syllable": " sut1 ","number": 2 },
			{"syllable": " suah1 ","number": 2 },
			{"syllable": " sua1 ","number": 2 },
			{"syllable": " siunn1 ","number": 2 },
			{"syllable": " siong5 ","number": 2 },
			{"syllable": " siok2 ","number": 2 },
			{"syllable": " sing3 ","number": 2 },
			{"syllable": " siang2 ","number": 2 },
			{"syllable": " sang2 ","number": 2 },
			{"syllable": " san4 ","number": 2 },
			{"syllable": " rip3 ","number": 2 },
			{"syllable": " rin3 ","number": 2 },
			{"syllable": " queh2 ","number": 2 },
			{"syllable": " quan3 ","number": 2 },
			{"syllable": " qik2 ","number": 2 },
			{"syllable": " qi2 ","number": 2 },
			{"syllable": " qau2 ","number": 2 },
			{"syllable": " pua4 ","number": 2 },
			{"syllable": " por2 ","number": 2 },
			{"syllable": " pen4 ","number": 2 },
			{"syllable": " or3 ","number": 2 },
			{"syllable": " oh5 ","number": 2 },
			{"syllable": " o4 ","number": 2 },
			{"syllable": " nua1 ","number": 2 },
			{"syllable": " nqo1 ","number": 2 },
			{"syllable": " niu3 ","number": 2 },
			{"syllable": " nia1 ","number": 2 },
			{"syllable": " nau3 ","number": 2 },
			{"syllable": " nai3 ","number": 2 },
			{"syllable": " mng5 ","number": 2 },
			{"syllable": " mau2 ","number": 2 },
			{"syllable": " mai3 ","number": 2 },
			{"syllable": " mah3 ","number": 2 },
			{"syllable": " m2 ","number": 2 },
			{"syllable": " lun3 ","number": 2 },
			{"syllable": " lue3 ","number": 2 },
			{"syllable": " lok2 ","number": 2 },
			{"syllable": " lit1 ","number": 2 },
			{"syllable": " lip3 ","number": 2 },
			{"syllable": " ling3 ","number": 2 },
			{"syllable": " ling2 ","number": 2 },
			{"syllable": " lim5 ","number": 2 },
			{"syllable": " liam3 ","number": 2 },
			{"syllable": " let2 ","number": 2 },
			{"syllable": " le4 ","number": 2 },
			{"syllable": " lat2 ","number": 2 },
			{"syllable": " lap3 ","number": 2 },
			{"syllable": " lak3 ","number": 2 },
			{"syllable": " lak1 ","number": 2 },
			{"syllable": " kuan1 ","number": 2 },
			{"syllable": " kong4 ","number": 2 },
			{"syllable": " kiau4 ","number": 2 },
			{"syllable": " keh2 ","number": 2 },
			{"syllable": " kan2 ","number": 2 },
			{"syllable": " ior2 ","number": 2 },
			{"syllable": " inn2 ","number": 2 },
			{"syllable": " hue5 ","number": 2 },
			{"syllable": " hu4 ","number": 2 },
			{"syllable": " hu3 ","number": 2 },
			{"syllable": " hong1 ","number": 2 },
			{"syllable": " hoh3 ","number": 2 },
			{"syllable": " hoh2 ","number": 2 },
			{"syllable": " ho4 ","number": 2 },
			{"syllable": " ho1 ","number": 2 },
			{"syllable": " hng2 ","number": 2 },
			{"syllable": " hiong2 ","number": 2 },
			{"syllable": " hing3 ","number": 2 },
			{"syllable": " hiau4 ","number": 2 },
			{"syllable": " hiang4 ","number": 2 },
			{"syllable": " hiang1 ","number": 2 },
			{"syllable": " hau4 ","number": 2 },
			{"syllable": " hap2 ","number": 2 },
			{"syllable": " hannh5 ","number": 2 },
			{"syllable": " hannh1 ","number": 2 },
			{"syllable": " hang5 ","number": 2 },
			{"syllable": " ha2 ","number": 2 },
			{"syllable": " gui3 ","number": 2 },
			{"syllable": " guan4 ","number": 2 },
			{"syllable": " gua4 ","number": 2 },
			{"syllable": " gorh ","number": 2 },
			{"syllable": " go1 ","number": 2 },
			{"syllable": " gip2 ","number": 2 },
			{"syllable": " gin3 ","number": 2 },
			{"syllable": " gim1 ","number": 2 },
			{"syllable": " gik2 ","number": 2 },
			{"syllable": " gang5 ","number": 2 },
			{"syllable": " gak2 ","number": 2 },
			{"syllable": " gah ","number": 2 },
			{"syllable": " en3 ","number": 2 },
			{"syllable": " dua4 ","number": 2 },
			{"syllable": " dua2 ","number": 2 },
			{"syllable": " diunn5 ","number": 2 },
			{"syllable": " diunn1 ","number": 2 },
			{"syllable": " dit1 ","number": 2 },
			{"syllable": " diorh1 ","number": 2 },
			{"syllable": " ding5 ","number": 2 },
			{"syllable": " dik1 ","number": 2 },
			{"syllable": " dan3 ","number": 2 },
			{"syllable": " dan2 ","number": 2 },
			{"syllable": " cuan5 ","number": 2 },
			{"syllable": " cu1 ","number": 2 },
			{"syllable": " ciunn2 ","number": 2 },
			{"syllable": " ciunn1 ","number": 2 },
			{"syllable": " ciu3 ","number": 2 },
			{"syllable": " cit2 ","number": 2 },
			{"syllable": " cinn2 ","number": 2 },
			{"syllable": " cing3 ","number": 2 },
			{"syllable": " ciann4 ","number": 2 },
			{"syllable": " cia1 ","number": 2 },
			{"syllable": " ci3 ","number": 2 },
			{"syllable": " cau2 ","number": 2 },
			{"syllable": " cau1 ","number": 2 },
			{"syllable": " cang4 ","number": 2 },
			{"syllable": " can5 ","number": 2 },
			{"syllable": " cam2 ","number": 2 },
			{"syllable": " bun4 ","number": 2 },
			{"syllable": " bun2 ","number": 2 },
			{"syllable": " bue2 ","number": 2 },
			{"syllable": " bor3 ","number": 2 },
			{"syllable": " bor2 ","number": 2 },
			{"syllable": " binn2 ","number": 2 },
			{"syllable": " bing1 ","number": 2 },
			{"syllable": " biann3 ","number": 2 },
			{"syllable": " ben4 ","number": 2 },
			{"syllable": " be3 ","number": 2 },
			{"syllable": " ba5 ","number": 2 },
			{"syllable": " ba1 ","number": 2 },
			{"syllable": " au5 ","number": 2 },
			{"syllable": " ap1 ","number": 2 },
			{"syllable": " ang5 ","number": 2 },
			{"syllable": " zun4 ","number": 1 },
			{"syllable": " zue3 ","number": 1 },
			{"syllable": " zuann1 ","number": 1 },
			{"syllable": " zuan5 ","number": 1 },
			{"syllable": " zuainn2 ","number": 1 },
			{"syllable": " zuai4 ","number": 1 },
			{"syllable": " zua3 ","number": 1 },
			{"syllable": " zu2 ","number": 1 },
			{"syllable": " zorh2 ","number": 1 },
			{"syllable": " zong2 ","number": 1 },
			{"syllable": " zong1 ","number": 1 },
			{"syllable": " zo4 ","number": 1 },
			{"syllable": " zip1 ","number": 1 },
			{"syllable": " ziorh3 ","number": 1 },
			{"syllable": " zior1 ","number": 1 },
			{"syllable": " zim2 ","number": 1 },
			{"syllable": " ziap2 ","number": 1 },
			{"syllable": " ziap1 ","number": 1 },
			{"syllable": " ziann3 ","number": 1 },
			{"syllable": " ziann1 ","number": 1 },
			{"syllable": " ziam3 ","number": 1 },
			{"syllable": " zi2 ","number": 1 },
			{"syllable": " zen3 ","number": 1 },
			{"syllable": " ze5 ","number": 1 },
			{"syllable": " zau1 ","number": 1 },
			{"syllable": " zap1 ","number": 1 },
			{"syllable": " zaih1 ","number": 1 },
			{"syllable": " zai5 ","number": 1 },
			{"syllable": " vun3 ","number": 1 },
			{"syllable": " vun1 ","number": 1 },
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
			{"syllable": " veh2 ","number": 1 },
			{"syllable": " vak3 ","number": 1 },
			{"syllable": " va3 ","number": 1 },
			{"syllable": " uat3 ","number": 1 },
			{"syllable": " uann4 ","number": 1 },
			{"syllable": " tun2 ","number": 1 },
			{"syllable": " tui4 ","number": 1 },
			{"syllable": " tuan2 ","number": 1 },
			{"syllable": " tor4 ","number": 1 },
			{"syllable": " tok1 ","number": 1 },
			{"syllable": " tng3 ","number": 1 },
			{"syllable": " tng2 ","number": 1 },
			{"syllable": " ting2 ","number": 1 },
			{"syllable": " tiau3 ","number": 1 },
			{"syllable": " tiau1 ","number": 1 },
			{"syllable": " teh2 ","number": 1 },
			{"syllable": " tau4 ","number": 1 },
			{"syllable": " tang1 ","number": 1 },
			{"syllable": " tan3 ","number": 1 },
			{"syllable": " tam4 ","number": 1 },
			{"syllable": " tai4 ","number": 1 },
			{"syllable": " ta1 ","number": 1 },
			{"syllable": " sun4 ","number": 1 },
			{"syllable": " sui5 ","number": 1 },
			{"syllable": " sui1 ","number": 1 },
			{"syllable": " sue4 ","number": 1 },
			{"syllable": " suann3 ","number": 1 },
			{"syllable": " suann1 ","number": 1 },
			{"syllable": " suan2 ","number": 1 },
			{"syllable": " suan1 ","number": 1 },
			{"syllable": " sua3 ","number": 1 },
			{"syllable": " su4 ","number": 1 },
			{"syllable": " sor4 ","number": 1 },
			{"syllable": " song1 ","number": 1 },
			{"syllable": " so3 ","number": 1 },
			{"syllable": " sng1 ","number": 1 },
			{"syllable": " sior ","number": 1 },
			{"syllable": " sionn3 ","number": 1 },
			{"syllable": " sinn2 ","number": 1 },
			{"syllable": " sing5 ","number": 1 },
			{"syllable": " sim4 ","number": 1 },
			{"syllable": " sik3 ","number": 1 },
			{"syllable": " sik2 ","number": 1 },
			{"syllable": " sik1 ","number": 1 },
			{"syllable": " siau3 ","number": 1 },
			{"syllable": " siau2 ","number": 1 },
			{"syllable": " siann2 ","number": 1 },
			{"syllable": " siang4 ","number": 1 },
			{"syllable": " siang3 ","number": 1 },
			{"syllable": " set1 ","number": 1 },
			{"syllable": " sennh2 ","number": 1 },
			{"syllable": " senn5 ","number": 1 },
			{"syllable": " senn3 ","number": 1 },
			{"syllable": " sen5 ","number": 1 },
			{"syllable": " sen1 ","number": 1 },
			{"syllable": " sau4 ","number": 1 },
			{"syllable": " san3 ","number": 1 },
			{"syllable": " s3 ","number": 1 },
			{"syllable": " ruah2 ","number": 1 },
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
			{"syllable": " qun4 ","number": 1 },
			{"syllable": " quan5 ","number": 1 },
			{"syllable": " qua5 ","number": 1 },
			{"syllable": " qua ","number": 1 },
			{"syllable": " qip3 ","number": 1 },
			{"syllable": " qip2 ","number": 1 },
			{"syllable": " qin5 ","number": 1 },
			{"syllable": " qiann4 ","number": 1 },
			{"syllable": " qiam2 ","number": 1 },
			{"syllable": " qia3 ","number": 1 },
			{"syllable": " qia2 ","number": 1 },
			{"syllable": " qen5 ","number": 1 },
			{"syllable": " qeh3 ","number": 1 },
			{"syllable": " qe2 ","number": 1 },
			{"syllable": " pue4 ","number": 1 },
			{"syllable": " pue3 ","number": 1 },
			{"syllable": " puann2 ","number": 1 },
			{"syllable": " por3 ","number": 1 },
			{"syllable": " pong2 ","number": 1 },
			{"syllable": " po2 ","number": 1 },
			{"syllable": " ping2 ","number": 1 },
			{"syllable": " piann1 ","number": 1 },
			{"syllable": " pi2 ","number": 1 },
			{"syllable": " pi1 ","number": 1 },
			{"syllable": " pau3 ","number": 1 },
			{"syllable": " pang5 ","number": 1 },
			{"syllable": " pang1 ","number": 1 },
			{"syllable": " painn4 ","number": 1 },
			{"syllable": " pai4 ","number": 1 },
			{"syllable": " pai3 ","number": 1 },
			{"syllable": " pa3 ","number": 1 },
			{"syllable": " ong4 ","number": 1 },
			{"syllable": " o ","number": 1 },
			{"syllable": " nqo4 ","number": 1 },
			{"syllable": " nqo3 ","number": 1 },
			{"syllable": " nqo2 ","number": 1 },
			{"syllable": " nqe3 ","number": 1 },
			{"syllable": " nngh2 ","number": 1 },
			{"syllable": " niu5 ","number": 1 },
			{"syllable": " nih2 ","number": 1 },
			{"syllable": " nia4 ","number": 1 },
			{"syllable": " nia3 ","number": 1 },
			{"syllable": " ngh2 ","number": 1 },
			{"syllable": " ng3 ","number": 1 },
			{"syllable": " ne3 ","number": 1 },
			{"syllable": " nau4 ","number": 1 },
			{"syllable": " nau2 ","number": 1 },
			{"syllable": " mui1 ","number": 1 },
			{"syllable": " mui ","number": 1 },
			{"syllable": " mue5 ","number": 1 },
			{"syllable": " mo2 ","number": 1 },
			{"syllable": " mih2 ","number": 1 },
			{"syllable": " mia5 ","number": 1 },
			{"syllable": " mia2 ","number": 1 },
			{"syllable": " mi3 ","number": 1 },
			{"syllable": " mh1 ","number": 1 },
			{"syllable": " me4 ","number": 1 },
			{"syllable": " m1 ","number": 1 },
			{"syllable": " lun5 ","number": 1 },
			{"syllable": " lueh2 ","number": 1 },
			{"syllable": " luan4 ","number": 1 },
			{"syllable": " luaih2 ","number": 1 },
			{"syllable": " luai4 ","number": 1 },
			{"syllable": " luai3 ","number": 1 },
			{"syllable": " lua3 ","number": 1 },
			{"syllable": " lorh2 ","number": 1 },
			{"syllable": " lor2 ","number": 1 },
			{"syllable": " lor1 ","number": 1 },
			{"syllable": " long3 ","number": 1 },
			{"syllable": " lok1 ","number": 1 },
			{"syllable": " loh3 ","number": 1 },
			{"syllable": " lo3 ","number": 1 },
			{"syllable": " liu1 ","number": 1 },
			{"syllable": " lik3 ","number": 1 },
			{"syllable": " lih3 ","number": 1 },
			{"syllable": " lih2 ","number": 1 },
			{"syllable": " lih1 ","number": 1 },
			{"syllable": " liau5 ","number": 1 },
			{"syllable": " liau2 ","number": 1 },
			{"syllable": " liap1 ","number": 1 },
			{"syllable": " lia2 ","number": 1 },
			{"syllable": " le5 ","number": 1 },
			{"syllable": " lau5 ","number": 1 },
			{"syllable": " lau4 ","number": 1 },
			{"syllable": " lang1 ","number": 1 },
			{"syllable": " lan4 ","number": 1 },
			{"syllable": " lan3 ","number": 1 },
			{"syllable": " lam5 ","number": 1 },
			{"syllable": " lam3 ","number": 1 },
			{"syllable": " lam2 ","number": 1 },
			{"syllable": " lak2 ","number": 1 },
			{"syllable": " laim3 ","number": 1 },
			{"syllable": " la4 ","number": 1 },
			{"syllable": " kuinn4 ","number": 1 },
			{"syllable": " kuann2 ","number": 1 },
			{"syllable": " kuan2 ","number": 1 },
			{"syllable": " kuainn5 ","number": 1 },
			{"syllable": " kuainn4 ","number": 1 },
			{"syllable": " kuainn3 ","number": 1 },
			{"syllable": " kuai3 ","number": 1 },
			{"syllable": " ku2 ","number": 1 },
			{"syllable": " ku1 ","number": 1 },
			{"syllable": " kong1 ","number": 1 },
			{"syllable": " kit1 ","number": 1 },
			{"syllable": " king3 ","number": 1 },
			{"syllable": " king ","number": 1 },
			{"syllable": " kin1 ","number": 1 },
			{"syllable": " kiang4 ","number": 1 },
			{"syllable": " kiam4 ","number": 1 },
			{"syllable": " kiam3 ","number": 1 },
			{"syllable": " kiam2 ","number": 1 },
			{"syllable": " kiai4 ","number": 1 },
			{"syllable": " kia2 ","number": 1 },
			{"syllable": " ki2 ","number": 1 },
			{"syllable": " ke4 ","number": 1 },
			{"syllable": " ke3 ","number": 1 },
			{"syllable": " ke2 ","number": 1 },
			{"syllable": " kat1 ","number": 1 },
			{"syllable": " kang1 ","number": 1 },
			{"syllable": " kah2 ","number": 1 },
			{"syllable": " iu3 ","number": 1 },
			{"syllable": " iorh1 ","number": 1 },
			{"syllable": " iong5 ","number": 1 },
			{"syllable": " iok1 ","number": 1 },
			{"syllable": " iann2 ","number": 1 },
			{"syllable": " iah3 ","number": 1 },
			{"syllable": " hui4 ","number": 1 },
			{"syllable": " huat3 ","number": 1 },
			{"syllable": " hua1 ","number": 1 },
			{"syllable": " hu1 ","number": 1 },
			{"syllable": " honnh5 ","number": 1 },
			{"syllable": " honnh1 ","number": 1 },
			{"syllable": " honn4 ","number": 1 },
			{"syllable": " hong5 ","number": 1 },
			{"syllable": " hong2 ","number": 1 },
			{"syllable": " hok3 ","number": 1 },
			{"syllable": " hok1 ","number": 1 },
			{"syllable": " ho5 ","number": 1 },
			{"syllable": " hmh5 ","number": 1 },
			{"syllable": " hiong5 ","number": 1 },
			{"syllable": " hiong4 ","number": 1 },
			{"syllable": " hiong3 ","number": 1 },
			{"syllable": " hiong1 ","number": 1 },
			{"syllable": " hing2 ","number": 1 },
			{"syllable": " him2 ","number": 1 },
			{"syllable": " hiam4 ","number": 1 },
			{"syllable": " hiam2 ","number": 1 },
			{"syllable": " hiam1 ","number": 1 },
			{"syllable": " hiai4 ","number": 1 },
			{"syllable": " hennh3 ","number": 1 },
			{"syllable": " henn3 ","number": 1 },
			{"syllable": " henn2 ","number": 1 },
			{"syllable": " hen5 ","number": 1 },
			{"syllable": " hen2 ","number": 1 },
			{"syllable": " he4 ","number": 1 },
			{"syllable": " hann4 ","number": 1 },
			{"syllable": " hann1 ","number": 1 },
			{"syllable": " ham3 ","number": 1 },
			{"syllable": " hainn4 ","number": 1 },
			{"syllable": " haih2 ","number": 1 },
			{"syllable": " hah2 ","number": 1 },
			{"syllable": " gun2 ","number": 1 },
			{"syllable": " guat1 ","number": 1 },
			{"syllable": " guann2 ","number": 1 },
			{"syllable": " guai3 ","number": 1 },
			{"syllable": " guah1 ","number": 1 },
			{"syllable": " gu2 ","number": 1 },
			{"syllable": " gu1 ","number": 1 },
			{"syllable": " gor2 ","number": 1 },
			{"syllable": " gong5 ","number": 1 },
			{"syllable": " gok1 ","number": 1 },
			{"syllable": " go5 ","number": 1 },
			{"syllable": " go2 ","number": 1 },
			{"syllable": " gng4 ","number": 1 },
			{"syllable": " gng1 ","number": 1 },
			{"syllable": " giunn1 ","number": 1 },
			{"syllable": " gip1 ","number": 1 },
			{"syllable": " giong5 ","number": 1 },
			{"syllable": " giong4 ","number": 1 },
			{"syllable": " ginn4 ","number": 1 },
			{"syllable": " ging5 ","number": 1 },
			{"syllable": " giann1 ","number": 1 },
			{"syllable": " gia3 ","number": 1 },
			{"syllable": " get2 ","number": 1 },
			{"syllable": " gen3 ","number": 1 },
			{"syllable": " gen2 ","number": 1 },
			{"syllable": " gaui1 ","number": 1 },
			{"syllable": " gann4 ","number": 1 },
			{"syllable": " gang4 ","number": 1 },
			{"syllable": " gam2 ","number": 1 },
			{"syllable": " ga1 ","number": 1 },
			{"syllable": " eh5 ","number": 1 },
			{"syllable": " dun3 ","number": 1 },
			{"syllable": " dun1 ","number": 1 },
			{"syllable": " dui2 ","number": 1 },
			{"syllable": " dueh2 ","number": 1 },
			{"syllable": " due4 ","number": 1 },
			{"syllable": " duann3 ","number": 1 },
			{"syllable": " do5 ","number": 1 },
			{"syllable": " dit2 ","number": 1 },
			{"syllable": " din4 ","number": 1 },
			{"syllable": " din3 ","number": 1 },
			{"syllable": " dik3 ","number": 1 },
			{"syllable": " dik2 ","number": 1 },
			{"syllable": " dih1 ","number": 1 },
			{"syllable": " diam2 ","number": 1 },
			{"syllable": " di5 ","number": 1 },
			{"syllable": " de1 ","number": 1 },
			{"syllable": " de ","number": 1 },
			{"syllable": " dat3 ","number": 1 },
			{"syllable": " dann3 ","number": 1 },
			{"syllable": " dang1 ","number": 1 },
			{"syllable": " dan5 ","number": 1 },
			{"syllable": " dam1 ","number": 1 },
			{"syllable": " dah2 ","number": 1 },
			{"syllable": " da3 ","number": 1 },
			{"syllable": " da2 ","number": 1 },
			{"syllable": " cut3 ","number": 1 },
			{"syllable": " cuan2 ","number": 1 },
			{"syllable": " cua2 ","number": 1 },
			{"syllable": " cor3 ","number": 1 },
			{"syllable": " co2 ","number": 1 },
			{"syllable": " co1 ","number": 1 },
			{"syllable": " cit1 ","number": 1 },
			{"syllable": " ciorh3 ","number": 1 },
			{"syllable": " cior4 ","number": 1 },
			{"syllable": " cior3 ","number": 1 },
			{"syllable": " ciong3 ","number": 1 },
			{"syllable": " cinn4 ","number": 1 },
			{"syllable": " cinn ","number": 1 },
			{"syllable": " cim2 ","number": 1 },
			{"syllable": " ciah2 ","number": 1 },
			{"syllable": " ci5 ","number": 1 },
			{"syllable": " ci4 ","number": 1 },
			{"syllable": " cet1 ","number": 1 },
			{"syllable": " cen2 ","number": 1 },
			{"syllable": " cap2 ","number": 1 },
			{"syllable": " ca4 ","number": 1 },
			{"syllable": " but3 ","number": 1 },
			{"syllable": " bor5 ","number": 1 },
			{"syllable": " bor4 ","number": 1 },
			{"syllable": " bo1 ","number": 1 },
			{"syllable": " bng4 ","number": 1 },
			{"syllable": " bit3 ","number": 1 },
			{"syllable": " bit1 ","number": 1 },
			{"syllable": " bing5 ","number": 1 },
			{"syllable": " bing2 ","number": 1 },
			{"syllable": " bik2 ","number": 1 },
			{"syllable": " bik1 ","number": 1 },
			{"syllable": " biah2 ","number": 1 },
			{"syllable": " bi4 ","number": 1 },
			{"syllable": " bi2 ","number": 1 },
			{"syllable": " benn3 ","number": 1 },
			{"syllable": " be4 ","number": 1 },
			{"syllable": " bau ","number": 1 },
			{"syllable": " bak3 ","number": 1 },
			{"syllable": " bai5 ","number": 1 },
			{"syllable": " bah3 ","number": 1 },
			{"syllable": " bah1 ","number": 1 },
			{"syllable": " ang3 ","number": 1 },
			{"syllable": " an5 ","number": 1 },
			{"syllable": " an3 ","number": 1 },
			{"syllable": " aih3 ","number": 1 },
			{"syllable": " ai5 ","number": 1 },
			{"syllable": " ai1 ","number": 1 },
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
<a href="http://140.109.18.117/GitRepos/finish/DaAi/vvrs01-20130301%20(20130316)-0416.trs">http://140.109.18.117/GitRepos/finish/DaAi/vvrs01-20130301%20(20130316)-0416.trs</a>
<a href="http://140.109.18.117/GitRepos/finish/DaAi/vvrs04-20130309(0324)-20130420.trs">http://140.109.18.117/GitRepos/finish/DaAi/vvrs04-20130309(0324)-20130420.trs</a>
<a href="http://140.109.18.117/GitRepos/finish/DaAi/vvrs07-20130308(0404)-0422.trs">http://140.109.18.117/GitRepos/finish/DaAi/vvrs07-20130308(0404)-0422.trs</a>
	 a2  :  474 
	 li1  :  373 
	 la3  :  321 
	 qua1  :  299 
	 e3  :  284 
	 a3  :  247 
	 si3  :  239 
	 hor4  :  191 
	 e2  :  189 
	 honnh2  :  184 
	 vu4  :  162 
	 ah1  :  151 
	 oh2  :  131 
	 u3  :  124 
	 m3  :  124 
	 gorh1  :  122 
	 lai5  :  110 
	 zit3  :  108 
	 a1  :  108 
	 i2  :  99 
	 vor2  :  98 
	 dor3  :  96 
	 an1  :  95 
	 lai2  :  91 
	 ki1  :  90 
	 ai4  :  88 
	 veh1  :  87 
	 ve3  :  85 
	 ziah1  :  78 
	 ki3  :  78 
	 lin1  :  74 
	 gong1  :  71 
	 ziok1  :  70 
	 ma3  :  70 
	 vor3  :  69 
	 long1  :  66 
	 hor1  :  65 
	 zit1  :  63 
	 neh2  :  62 
	 ne1  :  62 
	 ga3  :  62 
	 bah2  :  61 
	 a4  :  60 
	 kuann4  :  58 
	 gah1  :  58 
	 lan1  :  57 
	 kah1  :  55 
	 ze1  :  51 
	 oh3  :  51 
	 zin2  :  50 
	 ho3  :  50 
	 e1  :  50 
	 ziah3  :  49 
	 mai4  :  49 
	 li3  :  49 
	 na3  :  48 
	 gong4  :  48 
	 zu4  :  45 
	 zor4  :  45 
	 siunn3  :  44 
	 lai3  :  44 
	 na4  :  43 
	 zinn5  :  42 
	 zi4  :  42 
	 gam1  :  41 
	 li4  :  40 
	 dai3  :  40 
	 zai2  :  39 
	 sing2  :  38 
	 gin1  :  38 
	 diorh2  :  38 
	 ziah2  :  37 
	 o3  :  37 
	 mui2  :  37 
	 ga2  :  36 
	 zi3  :  35 
	 dor2  :  35 
	 diorh3  :  35 
	 di3  :  34 
	 he1  :  33 
	 it1  :  32 
	 dng4  :  32 
	 o2  :  31 
	 leh1  :  31 
	 gor1  :  31 
	 si2  :  30 
	 lang5  :  30 
	 i1  :  30 
	 ah2  :  30 
	 zu1  :  29 
	 siann1  :  28 
	 se4  :  28 
	 gin4  :  28 
	 ge1  :  28 
	 di2  :  28 
	 zing3  :  27 
	 zia1  :  27 
	 tak3  :  27 
	 qua3  :  27 
	 ma4  :  27 
	 hui2  :  27 
	 eh2  :  27 
	 dau4  :  27 
	 qun1  :  26 
	 le2  :  26 
	 kuann3  :  26 
	 dua3  :  26 
	 dang4  :  26 
	 dak3  :  26 
	 guai1  :  25 
	 dior3  :  25 
	 zai1  :  24 
	 sui4  :  24 
	 mih1  :  24 
	 lang2  :  24 
	 ge2  :  24 
	 ziann2  :  23 
	 ze2  :  23 
	 ui3  :  23 
	 huat1  :  23 
	 han2  :  23 
	 gang2  :  23 
	 zi5  :  22 
	 vor5  :  22 
	 sim1  :  22 
	 in2  :  22 
	 hok2  :  22 
	 ho2  :  22 
	 hak3  :  22 
	 cai3  :  22 
	 ue2  :  21 
	 u2  :  21 
	 sin2  :  21 
	 len5  :  21 
	 le3  :  21 
	 dui4  :  21 
	 qin1  :  20 
	 mai2  :  20 
	 hannh2  :  20 
	 gior4  :  20 
	 ge3  :  20 
	 dor4  :  20 
	 ding3  :  20 
	 dang2  :  20 
	 za2  :  19 
	 tau2  :  19 
	 na1  :  19 
	 mh2  :  19 
	 liau4  :  19 
	 iau4  :  19 
	 i4  :  19 
	 hau2  :  19 
	 giann2  :  19 
	 gi2  :  19 
	 dan4  :  19 
	 vi1  :  18 
	 ven1  :  18 
	 sit3  :  18 
	 siong3  :  18 
	 o1  :  18 
	 lu1  :  18 
	 li2  :  18 
	 kai4  :  18 
	 ka4  :  18 
	 huann2  :  18 
	 han3  :  18 
	 tiam2  :  17 
	 lor4  :  17 
	 liau1  :  17 
	 ko1  :  17 
	 ing2  :  17 
	 ging2  :  17 
	 giann4  :  17 
	 cu4  :  17 
	 zun2  :  16 
	 zor3  :  16 
	 zin1  :  16 
	 ziang3  :  16 
	 sior1  :  16 
	 sann2  :  16 
	 qo3  :  16 
	 iah1  :  16 
	 hi4  :  16 
	 gue4  :  16 
	 gin2  :  16 
	 dinn1  :  16 
	 dau1  :  16 
	 ciann1  :  16 
	 zuann4  :  15 
	 tau5  :  15 
	 so4  :  15 
	 ri2  :  15 
	 ko4  :  15 
	 giann5  :  15 
	 de4  :  15 
	 de3  :  15 
	 dan1  :  15 
	 bng2  :  15 
	 vai4  :  14 
	 tiann2  :  14 
	 te4  :  14 
	 sinn1  :  14 
	 sia2  :  14 
	 iann1  :  14 
	 gi3  :  14 
	 ge4  :  14 
	 gang1  :  14 
	 ceh2  :  14 
	 ai3  :  14 
	 ziann4  :  13 
	 zau4  :  13 
	 te3  :  13 
	 sun3  :  13 
	 su2  :  13 
	 sen2  :  13 
	 qua2  :  13 
	 meh2  :  13 
	 leh3  :  13 
	 iorh3  :  13 
	 hit1  :  13 
	 hiann1  :  13 
	 gau4  :  13 
	 gai4  :  13 
	 cut1  :  13 
	 cu3  :  13 
	 bau2  :  13 
	 aih2  :  13 
	 zu3  :  12 
	 ve2  :  12 
	 siong4  :  12 
	 siong1  :  12 
	 sia1  :  12 
	 sang3  :  12 
	 qua4  :  12 
	 nng3  :  12 
	 ni5  :  12 
	 nai4  :  12 
	 kau3  :  12 
	 iann4  :  12 
	 huan2  :  12 
	 hi2  :  12 
	 gau3  :  12 
	 cin1  :  12 
	 ban1  :  12 
	 zok1  :  11 
	 ze3  :  11 
	 vue4  :  11 
	 vue3  :  11 
	 ve1  :  11 
	 vang3  :  11 
	 siunn2  :  11 
	 siannh2  :  11 
	 si5  :  11 
	 kor1  :  11 
	 iong1  :  11 
	 ing5  :  11 
	 iau1  :  11 
	 i3  :  11 
	 ha3  :  11 
	 gu4  :  11 
	 go4  :  11 
	 e5  :  11 
	 dng1  :  11 
	 da4  :  11 
	 cun2  :  11 
	 cua3  :  11 
	 cing2  :  11 
	 ziau4  :  10 
	 za4  :  10 
	 quan2  :  10 
	 ni3  :  10 
	 kuai4  :  10 
	 kor3  :  10 
	 ing4  :  10 
	 guai2  :  10 
	 gong2  :  10 
	 gang3  :  10 
	 gan1  :  10 
	 zui1  :  9 
	 ziong2  :  9 
	 vo4  :  9 
	 vin2  :  9 
	 so1  :  9 
	 sit2  :  9 
	 sim2  :  9 
	 sang1  :  9 
	 na2  :  9 
	 me2  :  9 
	 lau2  :  9 
	 huat2  :  9 
	 hong4  :  9 
	 gan2  :  9 
	 gak1  :  9 
	 ga4  :  9 
	 cue2  :  9 
	 cai4  :  9 
	 beh2  :  9 
	 au2  :  9 
	 zing5  :  8 
	 vuai5  :  8 
	 vo1  :  8 
	 ui2  :  8 
	 u1  :  8 
	 tan4  :  8 
	 su1  :  8 
	 siu1  :  8 
	 si4  :  8 
	 senn2  :  8 
	 se3  :  8 
	 sann1  :  8 
	 sang4  :  8 
	 mih3  :  8 
	 lin2  :  8 
	 lau3  :  8 
	 la2  :  8 
	 kuan4  :  8 
	 i5  :  8 
	 hun2  :  8 
	 hue3  :  8 
	 hia1  :  8 
	 gui1  :  8 
	 gue3  :  8 
	 guann1  :  8 
	 guan2  :  8 
	 ga5  :  8 
	 du1  :  8 
	 dor1  :  8 
	 dong2  :  8 
	 dng3  :  8 
	 dit3  :  8 
	 cue3  :  8 
	 bai4  :  8 
	 zui4  :  7 
	 zap3  :  7 
	 vue1  :  7 
	 van3  :  7 
	 su3  :  7 
	 siu2  :  7 
	 sit1  :  7 
	 siorh2  :  7 
	 sin1  :  7 
	 sia4  :  7 
	 sannh2  :  7 
	 painn1  :  7 
	 ni2  :  7 
	 mng2  :  7 
	 lit2  :  7 
	 lia3  :  7 
	 len2  :  7 
	 lang3  :  7 
	 kor4  :  7 
	 kang2  :  7 
	 iong3  :  7 
	 hun4  :  7 
	 hue1  :  7 
	 hau3  :  7 
	 hann5  :  7 
	 hai2  :  7 
	 ging1  :  7 
	 gai2  :  7 
	 do2  :  7 
	 dng2  :  7 
	 cun1  :  7 
	 but1  :  7 
	 binn1  :  7 
	 bi1  :  7 
	 ban3  :  7 
	 ba4  :  7 
	 ang2  :  7 
	 an2  :  7 
	 zing4  :  6 
	 za1  :  6 
	 uann3  :  6 
	 uah2  :  6 
	 tiann3  :  6 
	 tiann1  :  6 
	 or2  :  6 
	 me5  :  6 
	 ma1  :  6 
	 leh2  :  6 
	 le1  :  6 
	 kun3  :  6 
	 kue3  :  6 
	 kng4  :  6 
	 king1  :  6 
	 iong2  :  6 
	 huah2  :  6 
	 hior4  :  6 
	 hiah1  :  6 
	 hang2  :  6 
	 ha1  :  6 
	 guan3  :  6 
	 gua1  :  6 
	 ging4  :  6 
	 gi4  :  6 
	 din2  :  6 
	 cinn1  :  6 
	 cia4  :  6 
	 can2  :  6 
	 ca1  :  6 
	 benn2  :  6 
	 ben3  :  6 
	 be2  :  6 
	 bau1  :  6 
	 bat3  :  6 
	 bang4  :  6 
	 zin4  :  5 
	 zik2  :  5 
	 zi1  :  5 
	 zau5  :  5 
	 zai3  :  5 
	 vo3  :  5 
	 ven4  :  5 
	 ve4  :  5 
	 vat3  :  5 
	 van2  :  5 
	 tiam1  :  5 
	 tang2  :  5 
	 sui2  :  5 
	 siu3  :  5 
	 sing1  :  5 
	 sin4  :  5 
	 ri3  :  5 
	 quat3  :  5 
	 quan1  :  5 
	 pen2  :  5 
	 pa4  :  5 
	 orh1  :  5 
	 nua4  :  5 
	 ne2  :  5 
	 ma2  :  5 
	 lo5  :  5 
	 lik2  :  5 
	 liam2  :  5 
	 kui2  :  5 
	 kiai3  :  5 
	 kau4  :  5 
	 ka2  :  5 
	 ka1  :  5 
	 iorh2  :  5 
	 ior1  :  5 
	 in1  :  5 
	 iau3  :  5 
	 ia3  :  5 
	 hue2  :  5 
	 huan5  :  5 
	 hiorh2  :  5 
	 hiau1  :  5 
	 hi1  :  5 
	 han4  :  5 
	 gui2  :  5 
	 gua3  :  5 
	 gor4  :  5 
	 gai1  :  5 
	 eh3  :  5 
	 ding4  :  5 
	 diam4  :  5 
	 diam1  :  5 
	 deh1  :  5 
	 de5  :  5 
	 de2  :  5 
	 dau2  :  5 
	 dann1  :  5 
	 cui3  :  5 
	 cor4  :  5 
	 ciunn3  :  5 
	 cin2  :  5 
	 ci2  :  5 
	 ca2  :  5 
	 bit2  :  5 
	 bin1  :  5 
	 bang2  :  5 
	 bak2  :  5 
	 bak1  :  5 
	 am4  :  5 
	 ziu1  :  4 
	 zin3  :  4 
	 zia4  :  4 
	 zai4  :  4 
	 vi2  :  4 
	 ui4  :  4 
	 tua2  :  4 
	 tok2  :  4 
	 tiau2  :  4 
	 siong2  :  4 
	 siok3  :  4 
	 siann4  :  4 
	 sia3  :  4 
	 senn1  :  4 
	 sai3  :  4 
	 ren5  :  4 
	 pue2  :  4 
	 oh1  :  4 
	 mui3  :  4 
	 mi4  :  4 
	 m4  :  4 
	 lorh3  :  4 
	 lo2  :  4 
	 lit3  :  4 
	 lip2  :  4 
	 liong2  :  4 
	 lin4  :  4 
	 lin3  :  4 
	 lim1  :  4 
	 liap2  :  4 
	 li  :  4 
	 kui1  :  4 
	 koh2  :  4 
	 kng3  :  4 
	 ki4  :  4 
	 kai2  :  4 
	 iu2  :  4 
	 ior3  :  4 
	 ing1  :  4 
	 hui3  :  4 
	 hue4  :  4 
	 hennh2  :  4 
	 hah1  :  4 
	 guan1  :  4 
	 guai4  :  4 
	 giong2  :  4 
	 ging3  :  4 
	 gau1  :  4 
	 dong3  :  4 
	 dong1  :  4 
	 do4  :  4 
	 diong3  :  4 
	 ding1  :  4 
	 diau5  :  4 
	 diann3  :  4 
	 dam3  :  4 
	 dam2  :  4 
	 dai2  :  4 
	 cut2  :  4 
	 ciu4  :  4 
	 ce2  :  4 
	 cang2  :  4 
	 buann2  :  4 
	 bo2  :  4 
	 biau1  :  4 
	 beh3  :  4 
	 bat1  :  4 
	 bai3  :  4 
	 am3  :  4 
	 zue4  :  3 
	 zior4  :  3 
	 ziong3  :  3 
	 zing2  :  3 
	 zim4  :  3 
	 vok3  :  3 
	 ving2  :  3 
	 vi3  :  3 
	 vat2  :  3 
	 vat1  :  3 
	 un3  :  3 
	 un2  :  3 
	 un1  :  3 
	 uan5  :  3 
	 uan4  :  3 
	 tng5  :  3 
	 tinn2  :  3 
	 sng4  :  3 
	 sng3  :  3 
	 sior4  :  3 
	 sior2  :  3 
	 sing4  :  3 
	 siau4  :  3 
	 senn4  :  3 
	 se1  :  3 
	 sai2  :  3 
	 sai1  :  3 
	 qo2  :  3 
	 qiap2  :  3 
	 qau5  :  3 
	 pue1  :  3 
	 pang2  :  3 
	 pai1  :  3 
	 orh3  :  3 
	 ong5  :  3 
	 nng2  :  3 
	 mng3  :  3 
	 me1  :  3 
	 m5  :  3 
	 lor3  :  3 
	 liorh2  :  3 
	 lim2  :  3 
	 liap3  :  3 
	 lia1  :  3 
	 len3  :  3 
	 lau1  :  3 
	 lan5  :  3 
	 laih2  :  3 
	 kun4  :  3 
	 kit3  :  3 
	 kit2  :  3 
	 kin2  :  3 
	 iu5  :  3 
	 iu1  :  3 
	 ing3  :  3 
	 hun1  :  3 
	 hua5  :  3 
	 hua4  :  3 
	 honnh3  :  3 
	 hioh2  :  3 
	 hing5  :  3 
	 hing4  :  3 
	 he2  :  3 
	 hang3  :  3 
	 hai4  :  3 
	 gut1  :  3 
	 guan5  :  3 
	 go3  :  3 
	 gior3  :  3 
	 giam1  :  3 
	 gi1  :  3 
	 gen4  :  3 
	 gau2  :  3 
	 gann1  :  3 
	 gam4  :  3 
	 en5  :  3 
	 en2  :  3 
	 eh1  :  3 
	 duann1  :  3 
	 dorh2  :  3 
	 dngh2  :  3 
	 diu2  :  3 
	 diong1  :  3 
	 dinn2  :  3 
	 ding2  :  3 
	 diau2  :  3 
	 di1  :  3 
	 dau3  :  3 
	 dann4  :  3 
	 cong4  :  3 
	 ciu1  :  3 
	 cenn2  :  3 
	 bun1  :  3 
	 buat3  :  3 
	 bua3  :  3 
	 bu2  :  3 
	 bo3  :  3 
	 bai2  :  3 
	 au3  :  3 
	 ang1  :  3 
	 ai2  :  3 
	 ah3  :  3 
	 a5  :  3 
	 zun1  :  2 
	 zue2  :  2 
	 zuat3  :  2 
	 zuan2  :  2 
	 zong4  :  2 
	 zng1  :  2 
	 ziu4  :  2 
	 zit  :  2 
	 ziong4  :  2 
	 ziong1  :  2 
	 zing1  :  2 
	 zik1  :  2 
	 ze4  :  2 
	 zau2  :  2 
	 zat3  :  2 
	 zam2  :  2 
	 zah1  :  2 
	 za5  :  2 
	 vun5  :  2 
	 vue2  :  2 
	 vong2  :  2 
	 vin3  :  2 
	 vang2  :  2 
	 vai3  :  2 
	 vai2  :  2 
	 uann1  :  2 
	 uan2  :  2 
	 uah1  :  2 
	 tuan5  :  2 
	 tng1  :  2 
	 tinn1  :  2 
	 tiann4  :  2 
	 tiam4  :  2 
	 te2  :  2 
	 te1  :  2 
	 sut1  :  2 
	 suah1  :  2 
	 sua1  :  2 
	 siunn1  :  2 
	 siong5  :  2 
	 siok2  :  2 
	 sing3  :  2 
	 siang2  :  2 
	 sang2  :  2 
	 san4  :  2 
	 rip3  :  2 
	 rin3  :  2 
	 queh2  :  2 
	 quan3  :  2 
	 qik2  :  2 
	 qi2  :  2 
	 qau2  :  2 
	 pua4  :  2 
	 por2  :  2 
	 pen4  :  2 
	 or3  :  2 
	 oh5  :  2 
	 o4  :  2 
	 nua1  :  2 
	 nqo1  :  2 
	 niu3  :  2 
	 nia1  :  2 
	 nau3  :  2 
	 nai3  :  2 
	 mng5  :  2 
	 mau2  :  2 
	 mai3  :  2 
	 mah3  :  2 
	 m2  :  2 
	 lun3  :  2 
	 lue3  :  2 
	 lok2  :  2 
	 lit1  :  2 
	 lip3  :  2 
	 ling3  :  2 
	 ling2  :  2 
	 lim5  :  2 
	 liam3  :  2 
	 let2  :  2 
	 le4  :  2 
	 lat2  :  2 
	 lap3  :  2 
	 lak3  :  2 
	 lak1  :  2 
	 kuan1  :  2 
	 kong4  :  2 
	 kiau4  :  2 
	 keh2  :  2 
	 kan2  :  2 
	 ior2  :  2 
	 inn2  :  2 
	 hue5  :  2 
	 hu4  :  2 
	 hu3  :  2 
	 hong1  :  2 
	 hoh3  :  2 
	 hoh2  :  2 
	 ho4  :  2 
	 ho1  :  2 
	 hng2  :  2 
	 hiong2  :  2 
	 hing3  :  2 
	 hiau4  :  2 
	 hiang4  :  2 
	 hiang1  :  2 
	 hau4  :  2 
	 hap2  :  2 
	 hannh5  :  2 
	 hannh1  :  2 
	 hang5  :  2 
	 ha2  :  2 
	 gui3  :  2 
	 guan4  :  2 
	 gua4  :  2 
	 gorh  :  2 
	 go1  :  2 
	 gip2  :  2 
	 gin3  :  2 
	 gim1  :  2 
	 gik2  :  2 
	 gang5  :  2 
	 gak2  :  2 
	 gah  :  2 
	 en3  :  2 
	 dua4  :  2 
	 dua2  :  2 
	 diunn5  :  2 
	 diunn1  :  2 
	 dit1  :  2 
	 diorh1  :  2 
	 ding5  :  2 
	 dik1  :  2 
	 dan3  :  2 
	 dan2  :  2 
	 cuan5  :  2 
	 cu1  :  2 
	 ciunn2  :  2 
	 ciunn1  :  2 
	 ciu3  :  2 
	 cit2  :  2 
	 cinn2  :  2 
	 cing3  :  2 
	 ciann4  :  2 
	 cia1  :  2 
	 ci3  :  2 
	 cau2  :  2 
	 cau1  :  2 
	 cang4  :  2 
	 can5  :  2 
	 cam2  :  2 
	 bun4  :  2 
	 bun2  :  2 
	 bue2  :  2 
	 bor3  :  2 
	 bor2  :  2 
	 binn2  :  2 
	 bing1  :  2 
	 biann3  :  2 
	 ben4  :  2 
	 be3  :  2 
	 ba5  :  2 
	 ba1  :  2 
	 au5  :  2 
	 ap1  :  2 
	 ang5  :  2 
	 zun4  :  1 
	 zue3  :  1 
	 zuann1  :  1 
	 zuan5  :  1 
	 zuainn2  :  1 
	 zuai4  :  1 
	 zua3  :  1 
	 zu2  :  1 
	 zorh2  :  1 
	 zong2  :  1 
	 zong1  :  1 
	 zo4  :  1 
	 zip1  :  1 
	 ziorh3  :  1 
	 zior1  :  1 
	 zim2  :  1 
	 ziap2  :  1 
	 ziap1  :  1 
	 ziann3  :  1 
	 ziann1  :  1 
	 ziam3  :  1 
	 zi2  :  1 
	 zen3  :  1 
	 ze5  :  1 
	 zau1  :  1 
	 zap1  :  1 
	 zaih1  :  1 
	 zai5  :  1 
	 vun3  :  1 
	 vun1  :  1 
	 vua5  :  1 
	 vua4  :  1 
	 vu1  :  1 
	 vor1  :  1 
	 vo2  :  1 
	 vit3  :  1 
	 vit2  :  1 
	 vip3  :  1 
	 vin5  :  1 
	 viau2  :  1 
	 veh2  :  1 
	 vak3  :  1 
	 va3  :  1 
	 uat3  :  1 
	 uann4  :  1 
	 tun2  :  1 
	 tui4  :  1 
	 tuan2  :  1 
	 tor4  :  1 
	 tok1  :  1 
	 tng3  :  1 
	 tng2  :  1 
	 ting2  :  1 
	 tiau3  :  1 
	 tiau1  :  1 
	 teh2  :  1 
	 tau4  :  1 
	 tang1  :  1 
	 tan3  :  1 
	 tam4  :  1 
	 tai4  :  1 
	 ta1  :  1 
	 sun4  :  1 
	 sui5  :  1 
	 sui1  :  1 
	 sue4  :  1 
	 suann3  :  1 
	 suann1  :  1 
	 suan2  :  1 
	 suan1  :  1 
	 sua3  :  1 
	 su4  :  1 
	 sor4  :  1 
	 song1  :  1 
	 so3  :  1 
	 sng1  :  1 
	 sior  :  1 
	 sionn3  :  1 
	 sinn2  :  1 
	 sing5  :  1 
	 sim4  :  1 
	 sik3  :  1 
	 sik2  :  1 
	 sik1  :  1 
	 siau3  :  1 
	 siau2  :  1 
	 siann2  :  1 
	 siang4  :  1 
	 siang3  :  1 
	 set1  :  1 
	 sennh2  :  1 
	 senn5  :  1 
	 senn3  :  1 
	 sen5  :  1 
	 sen1  :  1 
	 sau4  :  1 
	 san3  :  1 
	 s3  :  1 
	 ruah2  :  1 
	 ruah1  :  1 
	 ru2  :  1 
	 rit2  :  1 
	 rip  :  1 
	 rin5  :  1 
	 rin2  :  1 
	 rim4  :  1 
	 rim3  :  1 
	 rim2  :  1 
	 rim1  :  1 
	 ria1  :  1 
	 ren3  :  1 
	 ren2  :  1 
	 qun4  :  1 
	 quan5  :  1 
	 qua5  :  1 
	 qua  :  1 
	 qip3  :  1 
	 qip2  :  1 
	 qin5  :  1 
	 qiann4  :  1 
	 qiam2  :  1 
	 qia3  :  1 
	 qia2  :  1 
	 qen5  :  1 
	 qeh3  :  1 
	 qe2  :  1 
	 pue4  :  1 
	 pue3  :  1 
	 puann2  :  1 
	 por3  :  1 
	 pong2  :  1 
	 po2  :  1 
	 ping2  :  1 
	 piann1  :  1 
	 pi2  :  1 
	 pi1  :  1 
	 pau3  :  1 
	 pang5  :  1 
	 pang1  :  1 
	 painn4  :  1 
	 pai4  :  1 
	 pai3  :  1 
	 pa3  :  1 
	 ong4  :  1 
	 o  :  1 
	 nqo4  :  1 
	 nqo3  :  1 
	 nqo2  :  1 
	 nqe3  :  1 
	 nngh2  :  1 
	 niu5  :  1 
	 nih2  :  1 
	 nia4  :  1 
	 nia3  :  1 
	 ngh2  :  1 
	 ng3  :  1 
	 ne3  :  1 
	 nau4  :  1 
	 nau2  :  1 
	 mui1  :  1 
	 mui  :  1 
	 mue5  :  1 
	 mo2  :  1 
	 mih2  :  1 
	 mia5  :  1 
	 mia2  :  1 
	 mi3  :  1 
	 mh1  :  1 
	 me4  :  1 
	 m1  :  1 
	 lun5  :  1 
	 lueh2  :  1 
	 luan4  :  1 
	 luaih2  :  1 
	 luai4  :  1 
	 luai3  :  1 
	 lua3  :  1 
	 lorh2  :  1 
	 lor2  :  1 
	 lor1  :  1 
	 long3  :  1 
	 lok1  :  1 
	 loh3  :  1 
	 lo3  :  1 
	 liu1  :  1 
	 lik3  :  1 
	 lih3  :  1 
	 lih2  :  1 
	 lih1  :  1 
	 liau5  :  1 
	 liau2  :  1 
	 liap1  :  1 
	 lia2  :  1 
	 le5  :  1 
	 lau5  :  1 
	 lau4  :  1 
	 lang1  :  1 
	 lan4  :  1 
	 lan3  :  1 
	 lam5  :  1 
	 lam3  :  1 
	 lam2  :  1 
	 lak2  :  1 
	 laim3  :  1 
	 la4  :  1 
	 kuinn4  :  1 
	 kuann2  :  1 
	 kuan2  :  1 
	 kuainn5  :  1 
	 kuainn4  :  1 
	 kuainn3  :  1 
	 kuai3  :  1 
	 ku2  :  1 
	 ku1  :  1 
	 kong1  :  1 
	 kit1  :  1 
	 king3  :  1 
	 king  :  1 
	 kin1  :  1 
	 kiang4  :  1 
	 kiam4  :  1 
	 kiam3  :  1 
	 kiam2  :  1 
	 kiai4  :  1 
	 kia2  :  1 
	 ki2  :  1 
	 ke4  :  1 
	 ke3  :  1 
	 ke2  :  1 
	 kat1  :  1 
	 kang1  :  1 
	 kah2  :  1 
	 iu3  :  1 
	 iorh1  :  1 
	 iong5  :  1 
	 iok1  :  1 
	 iann2  :  1 
	 iah3  :  1 
	 hui4  :  1 
	 huat3  :  1 
	 hua1  :  1 
	 hu1  :  1 
	 honnh5  :  1 
	 honnh1  :  1 
	 honn4  :  1 
	 hong5  :  1 
	 hong2  :  1 
	 hok3  :  1 
	 hok1  :  1 
	 ho5  :  1 
	 hmh5  :  1 
	 hiong5  :  1 
	 hiong4  :  1 
	 hiong3  :  1 
	 hiong1  :  1 
	 hing2  :  1 
	 him2  :  1 
	 hiam4  :  1 
	 hiam2  :  1 
	 hiam1  :  1 
	 hiai4  :  1 
	 hennh3  :  1 
	 henn3  :  1 
	 henn2  :  1 
	 hen5  :  1 
	 hen2  :  1 
	 he4  :  1 
	 hann4  :  1 
	 hann1  :  1 
	 ham3  :  1 
	 hainn4  :  1 
	 haih2  :  1 
	 hah2  :  1 
	 gun2  :  1 
	 guat1  :  1 
	 guann2  :  1 
	 guai3  :  1 
	 guah1  :  1 
	 gu2  :  1 
	 gu1  :  1 
	 gor2  :  1 
	 gong5  :  1 
	 gok1  :  1 
	 go5  :  1 
	 go2  :  1 
	 gng4  :  1 
	 gng1  :  1 
	 giunn1  :  1 
	 gip1  :  1 
	 giong5  :  1 
	 giong4  :  1 
	 ginn4  :  1 
	 ging5  :  1 
	 giann1  :  1 
	 gia3  :  1 
	 get2  :  1 
	 gen3  :  1 
	 gen2  :  1 
	 gaui1  :  1 
	 gann4  :  1 
	 gang4  :  1 
	 gam2  :  1 
	 ga1  :  1 
	 eh5  :  1 
	 dun3  :  1 
	 dun1  :  1 
	 dui2  :  1 
	 dueh2  :  1 
	 due4  :  1 
	 duann3  :  1 
	 do5  :  1 
	 dit2  :  1 
	 din4  :  1 
	 din3  :  1 
	 dik3  :  1 
	 dik2  :  1 
	 dih1  :  1 
	 diam2  :  1 
	 di5  :  1 
	 de1  :  1 
	 de  :  1 
	 dat3  :  1 
	 dann3  :  1 
	 dang1  :  1 
	 dan5  :  1 
	 dam1  :  1 
	 dah2  :  1 
	 da3  :  1 
	 da2  :  1 
	 cut3  :  1 
	 cuan2  :  1 
	 cua2  :  1 
	 cor3  :  1 
	 co2  :  1 
	 co1  :  1 
	 cit1  :  1 
	 ciorh3  :  1 
	 cior4  :  1 
	 cior3  :  1 
	 ciong3  :  1 
	 cinn4  :  1 
	 cinn  :  1 
	 cim2  :  1 
	 ciah2  :  1 
	 ci5  :  1 
	 ci4  :  1 
	 cet1  :  1 
	 cen2  :  1 
	 cap2  :  1 
	 ca4  :  1 
	 but3  :  1 
	 bor5  :  1 
	 bor4  :  1 
	 bo1  :  1 
	 bng4  :  1 
	 bit3  :  1 
	 bit1  :  1 
	 bing5  :  1 
	 bing2  :  1 
	 bik2  :  1 
	 bik1  :  1 
	 biah2  :  1 
	 bi4  :  1 
	 bi2  :  1 
	 benn3  :  1 
	 be4  :  1 
	 bau  :  1 
	 bak3  :  1 
	 bai5  :  1 
	 bah3  :  1 
	 bah1  :  1 
	 ang3  :  1 
	 an5  :  1 
	 an3  :  1 
	 aih3  :  1 
	 ai5  :  1 
	 ai1  :  1 
	 a11  :  1 
</pre>
</body>
