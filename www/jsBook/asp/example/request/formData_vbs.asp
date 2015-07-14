<%title="經由 Request.Form 或 Request.QueryString 傳送表單資料的範例"%>
<!--#include file="../head.inc"-->
<hr>

<form action="formData_vbs.asp?xxx=yyy&aaa=bbb" name="myform">
<ul>
<li>您的大名：<input name="your_name" value="鄭海龍">
<li>最帥的男明星 (單選)：
	<input type="radio" name="singer" value="吳尊" checked>吳尊
	<input type="radio" name="singer" value="林志穎">林志穎
	<input type="radio" name="singer" value="郭品超">郭品超
	<input type="radio" name="singer" value="言承旭">言承旭
<li>營養的課 (複選)：
	<input type="checkbox" name="course" value="資料結構">資料結構
	<input type="checkbox" name="course" value="離散數學" checked>離散數學
	<input type="checkbox" name="course" value="工程數學">工程數學
	<input type="checkbox" name="course" value="數值方法" checked>數值方法
<li>最喜歡的運動 (單選)：
	<select name="single_choice"> 
	<option value="網球" selected>網球
	<option value="蝦球">蝦球
	<option value="鉛球">鉛球
	<option value="Yoyo球">Yoyo球
	</select>
<li>去過的地方 (複選)：
	<select name="multiple_choice" size=3 multiple>
	<option value="San Francisco" selected>San Francisco
	<option value="Los Angeles">Los Angeles
	<option value="Boston" selected>Boston
	<option value="Seoul">Seoul
	<option value="Tokyo">Tokyo
	</select>
<li>我還有話要說：<br>
<textarea name="comments" cols=60 rows=3>
這個問卷很有趣...
只能意會，不能言傳...
</textarea>
</ul>
<center>
<input type="button" value="經由 get 送出" onClick="this.form.method='get'; this.form.submit()">
<input type="button" value="經由 post 送出" onClick="this.form.method='post'; this.form.submit()"><br>
（需按送出後，才可以看到下面資料喔！）
</center>
</form>

<h3 align=center>由 ASP 讀取到的表單資料</h3>
<!--#include file="../listdict.inc"-->
<p><% listdict Request.QueryString, "Request.QueryString" %>
<p><% listdict Request.Form, "Request.Form" %>

<hr>
<!--#include file="../foot.inc"-->
