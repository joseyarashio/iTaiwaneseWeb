<%@language=jscript%>

<%title="ASP 印出「Hello World!」的四種方法"%>
<!--#include file="head.inc"-->
<hr>

Four methods to print "Hello World!" in server-side VBScript:
<p>
<%Response.Write("Hello World!")%><br> 
<%="Hello World!"%><br>
<%x = "Hello World!"%><%Response.Write(x)%><br>
<%x = "Hello World!"%><%=x%><br>

<hr>
<!--#include file="foot.inc"-->
