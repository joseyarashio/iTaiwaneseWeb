<%@language=JScript%>
<%
x=Request.Form("url")+"";		// 轉成字串
if (x!="undefined")		// 代表由點選表單來重新載入此頁，由此開始轉址
	Response.Redirect(Request.Form("url"));
%>

<%title="Response.Redirect 的範例"%>
<!--#include file="../head.inc"-->
<hr>

請選一個轉址目標：
<form method=post>
<input type=radio name=url value=http://www.google.com onClick="this.form.submit()">Google 搜尋<br>
<input type=radio name=url value=http://www.nthu.edu.tw onClick="this.form.submit()">清大首頁<br>
<input type=radio name=url value=http://www.ntu.edu.tw onClick="this.form.submit()">台大首頁<br>
</form>

<hr>
<!--#include file="../foot.inc"-->
