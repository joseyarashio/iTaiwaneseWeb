<%@language=JScript%>
<%title="經由 Request.Form 或 Request.QueryString 傳送表單資料的範例"%>
<!--#include file="../head.inc"-->
<hr>

<form>
<ul>
<li>您的大名：<input name="your_name" value="Roger Jang">

<li>最帥的男歌手 (單選)：
	<input type="radio" name="singer" value="郭金發">郭金發
	<input type="radio" name="singer" value="鄭海龍" checked>鄭海龍
	<input type="radio" name="singer" value="林志穎">林志穎
	<input type="radio" name="singer" value="胡瓜">胡瓜
	<input type="radio" name="singer" value="劉德華">劉德華

<li>營養的課 (複選)：
<ul>
<li><input type="checkbox" name="course" value="C Language">C Language
<li><input type="checkbox" name="course" value="Engineering Mathematics">Engineering Mathematics
<li><input type="checkbox" name="course" value="Numerical Methods">Numerical Methods
<li><input type="checkbox" name="course" value="Web Programming" checked>Web Programming
<li><input type="checkbox" name="course" value="Neural Networks" checked>Neural Networks
<li><input type="checkbox" name="course" value="Fuzzy Logic">Fuzzy Logic
</ul>

<li>最喜歡的運動 (單選)：
<select name="single_choice"> 
<option value="籃球">籃球
<option value="網球" selected>網球
<option value="排球">排球
<option value="蝦球">蝦球
<option value="鉛球">鉛球
<option value="Yoyo球">Yoyo球
</select>

<li>去過的地方 (複選)：
<select name="multiple_choice" size=4 multiple>
<option value="San Francisco" selected>San Francisco
<option value="Los Angeles">Los Angeles
<option value="Boston" selected>Boston
<option value="Perth">Perth
<option value="Sydney">Sydney
<option value="Barcelona">Barcelona
<option value="Amsterdam">Amsterdam
<option value="Prague" selected>Prague
<option value="Seoul">Seoul
<option value="Tokyo">Tokyo
 <option value="Osaka">Osaka
</select>

<li>我還有話要說：<br>
<textarea name="comments" cols=50 rows=6>
這個問卷很有趣...
只能意會，不能言傳...
</textarea>
</ul>

<center>
<input type="button" value="經由 get 送出" onClick="this.form.submit()">
</center>

</form>

<hr>
<h3 align=center>由 ASP 讀取到的表單資料</h3>
<center>（請按送出後，才可以看到資料喔！）</center>
<!--#include file="../listdict.inc"-->
<p><% listdict(Request.QueryString, "Request.QueryString"); %>
<p><% listdict(Request.Form, "Request.Form"); %>

<hr>
<!--#include file="../foot.inc"-->
