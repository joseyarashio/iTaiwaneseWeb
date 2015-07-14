<%@Language=JScript%>
<%
now = new Date();
expDate = new Date();
expDate.setTime(now.getTime()+365*24*60*60*1000);	// 資料將被保留一年	
//expDate.setMonth(expDate.getMonth() + 12);	// 資料將被保留 12 個月
x = Request.Form("userName")+"";
if (x!="undefined"){
	Response.Cookies("userName") = Request("userName");
	Response.Cookies("userName").Expires = expDate.getVarDate();	// 必須使用 getVarDate() 將資料型態轉成 VARIANT
	Response.Cookies("userTime") = now;
	Response.Cookies("userTime").Expires = expDate.getVarDate();	// 必須使用 getVarDate() 將資料型態轉成 VARIANT
}
%>
<% title = "使用 Cookie 的基本範例"; %>
<!--#include file="../head.inc"-->
<hr>

<%
userName = Request.Cookies("userName")+""; 
if (userName == ""){ %>
	<p>您好像是第一次造訪本頁喔！
	<p>請填入您的大名，謝謝！
<% } else { %>
	<p><font size=+2> <font color=green><%=userName%></font> 您好!</font>
	<p>您上次登錄時間為<font color=blue><%=Request.Cookies("userTime")%></font>.
	<p>如果您的大名不是 <font color=green><%=userName%></font>，請重新登錄.
<% } %>

<form method=post>
大名：<input name="userName">
<input type=submit>
</form>
（您填入的資訊將會被保留在您的硬碟中的 Cookies，保留期限一年。）

<hr>
<!--#include file="../foot.inc"-->
