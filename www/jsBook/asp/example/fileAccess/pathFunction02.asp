<%@language=JScript%>
<% title="對於 Web 路徑的處理功能" %>
<!--#include file="../head.inc"-->
<hr>

<%
webPath=Request.ServerVariables("SCRIPT_NAME");
fso = Server.CreateObject("Scripting.FileSystemObject");
methods = [
	"GetAbsolutePathName",
	"GetFileName",
	"GetBaseName",
	"GetExtensionName",
	"GetDriveName",
	"GetParentFolderName"];
%>
<h3 align=center>webPath = <%=webPath%></h3>
<table border=1 align=center>
<% for (i=0; i<methods.length; i++){%>
	<tr><td><%cmd="fso." + methods[i] + "(webPath)";%><%=cmd%><td>&nbsp;<font color=green><%=eval(cmd)%></font>
<%}%>
</table>

<hr>
<!--#include file="../foot.inc"-->
