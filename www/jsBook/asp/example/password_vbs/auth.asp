<%title="密碼認證網頁"%>
<!--#include file="../head.inc"-->
<hr>
<%  
' 此頁之目的為進行密碼認證：
' 1. 若通過，則於原視窗開啟被保護之 target.asp 網頁
' 2. 若不通過，則請求重新輸入帳號、密碼

If ((request("login")="jang") And (request("password")="jang")) Then
	session("secret") = true %>
	<script>
	window.opener.document.location="<%=session("target")%>";	// 於原視窗開啟 target 網頁
	window.close();							// 關閉密碼認證視窗
	</script>
<% else
	If Not isempty(Request.ServerVariables("HTTP_REFERER")) Then	' 由 window.open() 所開，沒有 referer
		response.write("<p align=center>資料有誤，請重試：<br>")
	End If
%>
	<form method=post>
	<table border=0 align=center>
	<tr><td align=right>帳號：<td><input name="login" value="jang">
	<tr><td align=right>密碼：<td><input type=password name="password" value="jang">
	<tr><td align=center colspan=2><input type=submit></a>
	</table>
	</form>
<%
end If
%>
<hr>
<!--#include file="../foot.inc"-->
