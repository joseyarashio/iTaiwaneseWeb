<%@language=JScript%>
<%title="顯示計數器啟動時間的範例"%>
<!--#include file="../head.inc"-->
<hr>

<%
url = Request.ServerVariables("URL");
startTime = "startTime: " + url;
if (Application(startTime) == null){
	Application(url) = 0;	//在 JScript，預設值不是 0
	now = new Date();
	Application(startTime) = now.toLocaleString();
}
%>
<h3 align=center>從 <font color=green><%=Application(startTime)%></font> 以來，您是第 <font color=red><%=++Application(url)%></font> 位貴賓！</h3>

<hr>
<!--#include file="../foot.inc"-->
