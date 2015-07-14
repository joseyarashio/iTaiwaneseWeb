<%title="密碼認證網頁"%>
<!--#include file="../head.inc"-->

<%  
rem 此頁之目的為進行密碼認證：
rem 1. 若通過，則於原視窗開啟被保護之目標網頁
rem 2. 若不通過，則請求重新輸入帳號、密碼
%>

<%
If ((request("login")="jang") And (request("password")="jang") Or _
    (request("login")="roger") And (request("password")="roger") Or _
    (request("login")="jang") And (request("password")="roger")) Then
	session("secret") = true %>
	恭喜通過認證！<br>
	請關閉此視窗，並點選原連結。<br><br>
	<center><input type=button value='Close this window' onClick='window.close();'></center>")
	<script>
	window.opener.document.location="<%=session("target")%>";	// 於原視窗開啟 target 網頁
	window.close();	// 關閉密碼認證視窗
	</script>
<% else
	If Not isempty(Request.ServerVariables("HTTP_REFERER")) Then
		response.write("<p align=center>資料有誤，請重試：<br>")
	Else
		response.write("<p align=center>請輸入帳號、密碼：")
	End If
%>
	<form method=post name=form1>
	<table border=0 align=center>
	<tr>
		<td align=right>帳號：</td>
		<td><input type=text name="login" value="jang" size=20></td>
	<tr>
		<td align=right>密碼：</td>
		<td><input type=password name="password" value="jang" size=20></td>
	<tr>
		<td align=center colspan=2><input type=submit value="送出"></a></td>
	</tr>
	</table>
	</form>
<%
end If
%>

<!--#include file="../foot.inc"-->
