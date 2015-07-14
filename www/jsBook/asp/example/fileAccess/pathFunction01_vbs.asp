<% title="對於路徑的處理功能" %>
<!--#include file="../head.inc"-->
<hr>

<%
fullPath=Request.ServerVariables("PATH_TRANSLATED")
Set fso = Server.CreateObject("Scripting.FileSystemObject")
methods = Array(_
	"GetAbsolutePathName", _
	"GetFileName", _
	"GetBaseName", _
	"GetExtensionName", _
	"GetDriveName", _
	"GetParentFolderName")
%>
<h3 align=center>fullPath = <%=fullPath%></h3>
<table border=1 align=center>
<% For i=0 to UBound(methods)%>
	<tr><td><%cmd="fso." & methods(i) & "(fullPath)"%><%=cmd%><td>&nbsp;<font color=green><%=eval(cmd)%></font>
<%next%>
</table>

<hr>
<!--#include file="../foot.inc"-->
