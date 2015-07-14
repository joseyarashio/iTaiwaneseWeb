<% title="檢查硬碟所剩空間" %>
<!--#include file="../head.inc"-->
<hr>

<%
Function ShowFreeSpace(drivePath)
	Dim fso, d, s
	Set fso = CreateObject("Scripting.FileSystemObject")
	Set d = fso.GetDrive(fso.GetDriveName(drivePath))
	s = "Drive " & UCase(drivePath) & d.VolumeName
	s = s & " ===> Free Space: " & FormatNumber(d.FreeSpace/1024, 0) & " Kbytes<br>"
	ShowFreeSpace = s
End Function
%>
<%Response.write(ShowFreeSpace("c:\"))%>
<%Response.write(ShowFreeSpace("d:\"))%>

<hr>
<!!--#include file="../foot.inc"-->
