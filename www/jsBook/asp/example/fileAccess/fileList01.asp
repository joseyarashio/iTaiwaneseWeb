<%@language=JScript%>
<% title="列出目錄中的內容" %>
<!--#include file="../head.inc"-->
<hr>

<%
fso = Server.CreateObject("Scripting.FileSystemObject");
fullPath = Server.MapPath(".");
fd = fso.GetFolder(fullPath);
%>

<h3 align=center>
Contents of <%=fullPath%>:
</h3>
<table border=1 align=center>
<tr>
<th colspan=3>File Listing</th>
<tr>
<th>File name</th><th>Size (Bytes)</th><th>Last modified</th>
<%
var fileList=new Enumerator(fd.files);
for (fileList.moveFirst(); !fileList.atEnd(); fileList.moveNext()){
	Response.Write("<tr align=center>");
	Response.Write("<td><a href=\"" + fileList.item().name + "\">" + fileList.item().name + "</a></td>");
	Response.Write("<td>" + fileList.item().size + "</td>");
	Response.Write("<td>" + fileList.item().DateLastModified + "</td>");
	Response.Write("</tr>");
}
%>
</table>
<br>
<table border=1 align=center>
<tr>
<th colspan=3>Directory Listing</th>
<tr>
<tr>
<th>Folder name</th><th>Size (Bytes)</th><th>Last modified</th>
<%
var dirList=new Enumerator(fd.SubFolders);
for (dirList.moveFirst(); !dirList.atEnd(); dirList.moveNext()){
	Response.Write("<tr align=center>");
	Response.Write("<td><a href=\"" + dirList.item().name + "\">" + dirList.item().name + "</a></td>");
	Response.Write("<td>" + dirList.item().size + "</td>");
	Response.Write("<td>" + dirList.item().DateLastModified + "</td>");
	Response.Write("</tr>");
}
%>
</table>

<hr>
<!--#include file="../foot.inc"-->
