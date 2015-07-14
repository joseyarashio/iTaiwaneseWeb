<%@language=jscript%>
<%title="利用 ASP 印出大小不同的「Hello World!」"%>
<!--#include file="head.inc"-->
<hr>

<%
for (i=1; i<=5; i++){
	Response.Write("<font size=" + i + "> Hello World! </font><br>");
}
%>

<hr>
<!--#include file="foot.inc"-->
