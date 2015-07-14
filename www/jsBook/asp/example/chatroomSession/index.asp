<% title="以資料庫為主的聊天室" %>
<!--#include virtual="/jang/include/editfile.inc"-->
<html>
<head>
	<title><%=title%></title>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
	<meta HTTP-EQUIV="Expires" CONTENT="0">
	<style>
		td {font-family: "標楷體", "helvetica,arial", "Tahoma"}
		A:link {text-decoration: none}
		A:hover {text-decoration: underline}
	</style>
</head>

<body background="/jang/graphics/background/yellow.gif">
<font face="標楷體">
<h2 align=center><%=title%></h2>
<hr>
說明：
<ol>
<li>點選 <a href=/chatroomSession/webchat.asp>/chatroomSession/webchat.asp</a> 以進入登入畫面
<li>此範例修改自「Active Server Pages 程式設計實務」（科南資訊）
</ol>
<!--#include virtual="/jang/include/dir.inc"-->
<hr>

<script language="JavaScript">
document.write("Last updated on " + document.lastModified + ".")
</script>

<a href="/jang/sandbox/asp/lib/editfile.asp?FileName=<%=Request.ServerVariables("PATH_INFO")%>"><img align=right border=0 src="/jang/graphics/invisible.gif"></a>
</font>
</body>
</html>
