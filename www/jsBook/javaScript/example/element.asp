<%title="All Elements Used in a Form"%>
<!--#include file="head.inc"-->
<hr>

<form method="get" name="myform">

<ol>

<li>
您的大名：<input name="your_name" value="Roger Jang">

<p>
<li>
最帥的男歌手 (單選)：
<input type="radio" name="singer" value="郭金發">郭金發
<input type="radio" name="singer" value="鄭海龍" checked>鄭海龍
<input type="radio" name="singer" value="林志穎">林志穎
<input type="radio" name="singer" value="胡瓜">胡瓜
<input type="radio" name="singer" value="劉德華">劉德華

<p>
<li>
營養的課 (複選)：
<ul>
<li>
<input type="checkbox" name="course" value="C Language">C Language
<li>
<input type="checkbox" name="course" value="Engineering Mathematics">Engineering Mathematics
<li>
<input type="checkbox" name="course" value="Numerical Methods">Numerical Methods
<li>
<input type="checkbox" name="course" value="Web Programming" checked>Web Programming
<li>
<input type="checkbox" name="course" value="Neural Networks" checked>Neural Networks
<li>
<input type="checkbox" name="course" value="Fuzzy Logic">Fuzzy Logic
</ul>

<p>
<li>
最喜歡的運動 (單選)：
<select name="single_choice"> 
<option value="籃球">籃球
<option value="網球" selected>網球
<option value="排球">排球
<option value="蝦球">蝦球
<option value="鉛球">鉛球
<option value="Yoyo球">Yoyo球
</select>

<p>
<li>
去過的地方 (複選)：
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

<p>
<li>
我還有話要說：<br>
<textarea name="comments" cols=50 rows=6>
這個問卷很有趣...
只能意會，不能言傳...
</textarea>

</ol>

<script src="listform.js">
	document.writeln("Cannot find listform.js!")
</script>

<input type="submit" value="Submit">
<input type="reset" value="Reset">
<input type="button" value="Show Widgets' Values using JavaScript" onClick="showValue(this.form)">

</form>

<hr>
<h3 align=center>Properties of this form</h3>
<SCRIPT  src="listprop.js">
      document.writeln("Included file listprop.js not found");
</SCRIPT>
<SCRIPT>listprop(document.forms[0], "document.forms[0]")</SCRIPT>

<hr>
<h3 align=center>Inputs of this form received by ASP</h3>
<center>
(Please hit "Submit" to see new values.)
<br>
<% call answer %>
</center>

<SCRIPT LANGUAGE=VBScript RUNAT=Server>
sub answer
	Response.Write "<table border=1>"
	Response.Write "<tr align=center><td>名稱</td><td>輸入值</td></tr>"
	Set Params = Request.QueryString
	For Each p in Params
		Response.Write "<tr><td>" & p & "</td><td>" & Params(p) & "</td></tr>"
	Next
	Response.Write "</table>"
end sub
</SCRIPT>

<hr>
<!--#include file="foot.inc"-->
