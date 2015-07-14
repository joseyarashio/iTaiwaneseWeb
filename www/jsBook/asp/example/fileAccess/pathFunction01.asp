<%@language=JScript%>
<% title="對於實體路徑的處理功能" %>
<!--#include file="../head.inc"-->
<hr>

<%
physicalPath=Request.ServerVariables("PATH_TRANSLATED");
fso = Server.CreateObject("Scripting.FileSystemObject");
methods = [
	"GetAbsolutePathName",
	"GetFileName",
	"GetBaseName",
	"GetExtensionName",
	"GetDriveName",
	"GetParentFolderName"];
%>
<h3 align=center>physicalPath = <%=physicalPath%></h3>
<table border=1 align=center>
<% for (i=0; i<methods.length; i++){%>
	<tr><td><%cmd="fso." + methods[i] + "(physicalPath)";%><%=cmd%><td>&nbsp;<font color=green><%=eval(cmd)%></font>
<%}%>
</table>

<hr>
<!--#include file="../foot.inc"-->
