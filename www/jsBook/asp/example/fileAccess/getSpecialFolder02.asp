<%@language=JScript%>
<% title="�g�J�Ȧs�ɮ�" %>
<!--#include file="../head.inc"-->
<hr>

<%
fso = new ActiveXObject("Scripting.FileSystemObject");
tempFile = fso.GetTempName();
Response.Write("�Ȧs�ɮצW�� = " + tempFile + "<br>");
tempDir = fso.GetSpecialFolder(2);
Response.Write("�Ȧs�ɮ׸��| = " + tempDir.Path + "\\" + tempFile + "<br>");
fid = tempDir.CreateTextFile(tempFile);
fid.writeline("Hello World");
fid.close();
Response.Write("�ڭ̤w�g�b�Ȧs�ɮ׼g�J \"Hello World\"�I<br>");
%>

<hr>
<!--#include file="../foot.inc"-->
