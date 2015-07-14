<%title="顯示計數器啟動時間的範例"%>
<!--#include file="../head.inc"-->
<hr>

<%
URL = Request.ServerVariables("URL")
startTime = URL & "startTime"
If Application(URL) = Empty Then
	Application(startTime) = now
End If
Application(URL)=Application(URL)+1
%>
<h3 align=center>從 <font color=green><%=Application(startTime)%></font> 以來，您是第 <font color=red><%=Application(URL)%></font> 位貴賓！</h3>

<hr>
<!--#include file="../foot.inc"-->
