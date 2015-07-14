<%@language=JScript%>
<% title="列出目錄的屬性" %>
<!--#include file="../head.inc"-->
<hr>

<%
fso = Server.CreateObject("Scripting.FileSystemObject");
fileName = Request.ServerVariables("SCRIPT_NAME");
fullPath = Server.MapPath(fileName);
parentDir = fso.GetParentFolderName(fullPath);
dir = fso.GetFolder(parentDir);
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
//	"SubFolders",
	"Type"];
%>
<h3 align=center>dir = <%=dir%></h3>
<table border=1 align=center>
<% for (i=0; i<methods.length; i++){
	cmd = "dir." + methods[i]; %>
	<tr><td><%=cmd%><td>&nbsp;<font color=green><%=eval(cmd)%></font>
<%}%>
</table>

<hr>
<!--#include file="../foot.inc"-->
