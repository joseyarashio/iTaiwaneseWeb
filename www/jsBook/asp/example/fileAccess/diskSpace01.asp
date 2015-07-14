<%@language=JScript%>
<% title="檢查硬碟所剩空間" %>
<!--#include file="../head.inc"-->
<hr>

<%
function showFreeSpace(drivePath){
	var fso, d, out;
	fso = new ActiveXObject("Scripting.FileSystemObject");
	d = fso.GetDrive(fso.GetDriveName(drivePath));
	out = d.VolumeName + " (" + drivePath + ") ";
	out = out + " ===> Free Space: " + d.FreeSpace/1024/1024 + " MB<br>";
	return(out);
}
%>

<%Response.write(showFreeSpace("c:"))%>
<%Response.write(showFreeSpace("d:"))%>

<hr>
<!--#include file="../foot.inc"-->
