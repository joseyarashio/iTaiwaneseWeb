<%@language=JScript%>
<% title="取得特殊目錄" %>
<!--#include file="../head.inc"-->
<hr>

<%
fso = new ActiveXObject("Scripting.FileSystemObject");
windowsFolder = fso.GetSpecialFolder(0);	// Windows 資料夾
systemFolder = fso.GetSpecialFolder(1);		// System 資料夾
temporaryFolder = fso.GetSpecialFolder(2);	// 暫存資料夾
Response.Write("windowdsFolder = " + windowsFolder.Path + "<br>");
Response.Write("systemFolder = " + systemFolder.Path + "<br>");
Response.Write("temporaryFolder = " + temporaryFolder.Path + "<br>");
%>

<hr>
<!--#include file="../foot.inc"-->
