<%@language=JScript%>
<% title="寫入暫存檔案" %>
<!--#include file="../head.inc"-->
<hr>

<%
fso = new ActiveXObject("Scripting.FileSystemObject");
tempFile = fso.GetTempName();
Response.Write("暫存檔案名稱 = " + tempFile + "<br>");
tempDir = fso.GetSpecialFolder(2);
Response.Write("暫存檔案路徑 = " + tempDir.Path + "\\" + tempFile + "<br>");
fid = tempDir.CreateTextFile(tempFile);
fid.writeline("Hello World");
fid.close();
Response.Write("我們已經在暫存檔案寫入 \"Hello World\"！<br>");
%>

<hr>
<!--#include file="../foot.inc"-->
