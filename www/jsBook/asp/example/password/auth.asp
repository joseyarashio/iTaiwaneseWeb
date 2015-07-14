<%@language=jscript%>
<%title="密碼認證網頁"%>
<!--#include file="../head.inc"-->
<hr>
<%  
// 此頁之目的為進行密碼認證：
// 1. 若通過，則於原視窗開啟被保護之 target.asp 網頁
// 2. 若不通過，則請求重新輸入帳號、密碼

login=Request("login")+"";
password=Request("password")+"";
if ((login=="jang") && (password=="jang")){
	Session("ok") = true; %>
	<script>
	window.opener.document.location="<%=Session("target")%>";	// 於原視窗開啟 target 網頁
	window.close();							// 關閉密碼認證視窗
	</script>
<% } else {
//	if ((Request.ServerVariables("HTTP_REFERER")+"")!="undefined")	// 此網頁送出後呼叫自己（若由 window.open() 所開，沒有 referer）
	if ((login!="undefined") && (password!="undefined"))		// 此網頁送出後呼叫自己
		Response.Write("<p align=center>資料有誤，請重試：<br>");
%>
	<form method=post>
	<table border=0 align=center>
	<tr><td align=right>帳號：<td><input name="login" value="jang">
	<tr><td align=right>密碼：<td><input type=password name="password" value="jang">
	<tr><td align=center colspan=2><input type=submit></a>
	</table>
	</form>
<%
}
%>
<hr>
