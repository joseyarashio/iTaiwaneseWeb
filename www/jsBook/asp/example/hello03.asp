<%@language=jscript%>
<%title="�Q�� ASP �L�X�j�p���P���uHello World!�v"%>
<!--#include file="head.inc"-->
<hr>

<%
for (i=1; i<=5; i++){
	Response.Write("<font size=" + i + "> Hello World! </font><br>");
}
%>

<hr>
<!--#include file="foot.inc"-->
