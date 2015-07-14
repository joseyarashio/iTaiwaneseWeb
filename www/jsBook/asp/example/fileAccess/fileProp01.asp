<%@language=JScript%>
<% title="列出檔案的屬性" %>
<!--#include file="../head.inc"-->
<hr>

<%
fso = Server.CreateObject("Scripting.FileSystemObject");
fullPath = Request.ServerVariables("PATH_TRANSLATED");
file = fso.GetFile(fullPath);
methods = [
	"Attributes",
	"DateCreated",
	"DateLastAccessed",
	"DateLastModified",
	"Drive",
	"IsRootFolder",
	"Name",
	"ParentFolder",
	"Path",
	"ShortName",
	"ShortPath",
	"Size",
	"SubFolders",
	"Type"];
%>
<h3 align=center>file = <%=file%></h3>
<table border=1 align=center>
<% for (i=0; i<methods.length; i++){
	cmd = "file." + methods[i]; %>
	<tr><td><%=cmd%><td>&nbsp;<font color=green><%=eval(cmd)%></font>
<%}%>
</table>

<hr>
<!--#include file="../foot.inc"-->
