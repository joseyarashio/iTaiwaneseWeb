<%@language=JScript%>
<% title="���o�S��ؿ�" %>
<!--#include file="../head.inc"-->
<hr>

<%
fso = new ActiveXObject("Scripting.FileSystemObject");
windowsFolder = fso.GetSpecialFolder(0);	// Windows ��Ƨ�
systemFolder = fso.GetSpecialFolder(1);		// System ��Ƨ�
temporaryFolder = fso.GetSpecialFolder(2);	// �Ȧs��Ƨ�
Response.Write("windowdsFolder = " + windowsFolder.Path + "<br>");
Response.Write("systemFolder = " + systemFolder.Path + "<br>");
Response.Write("temporaryFolder = " + temporaryFolder.Path + "<br>");
%>

<hr>
<!--#include file="../foot.inc"-->
