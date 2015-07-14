<% title="列出目錄中的內容" %>
<!--#include file="../head.inc"-->
<hr>

<%
Set fso = Server.CreateObject("Scripting.FileSystemObject")
fullPath = Server.MapPath(".")
Set fd = fso.GetFolder(fullPath)
%>

<h3 align=center>
Contents of <%=fullPath%>:
</h3>
<table border=1 align=center>
<tr>
<th colspan=3>File Listing</th>
<tr>
<th>File name</th><th>Size (Bytes)</th><th>Last modified</th>
<% for each file in fd.files
	response.write("<tr align=center>")
	response.write("<td><a href=""" & file.name & """>" & file.name & "</a></td>")
	response.write("<td>" & file.size & "</td>")
	response.write("<td>" & file.DateLastModified & "</td>")
	response.write("</tr>")
next %>
</table>
<br>
<table border=1 align=center>
<tr>
<th colspan=3>Directory Listing</th>
<tr>
<th>Folder name</th><th>Size (Bytes)</th><th>Last modified</th>
<%
For Each dir in fd.SubFolders
	response.write("<tr align=center>")
	response.write("<td><a href=""" & dir.name & """>" & dir.name & "</a></td>")
	response.write("<td>" & dir.size & "</td>")
	response.write("<td>" & dir.DateLastModified & "</td>")
	response.write("</tr>")
Next
set fso=nothing
set fd=nothing
%>
</table>

<hr>
<!--#include file="../foot.inc"-->
