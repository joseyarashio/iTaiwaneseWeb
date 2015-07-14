<%@language=jscript%>
<html>
<body>
<hr>

<%Response.Write(Request.ServerVariables("HTTP_REFERER")+"");%>
<hr>
<%Response.Write(typeof(Request.ServerVariables("HTTP_REFERER")));%>
<hr>
<%Response.Write(Request.ServerVariables("QUERY_STRING")+"xxxx");%>
<hr>
<%Response.Write(typeof(Request.ServerVariables("QUERY_STRING")));%>
<hr>
<%Response.Write("url = "+Request.ServerVariables("URL"));%>
<hr>
<%
if ((Request.ServerVariables("HTTP_REFERER")+"")!="undefined")
		Response.Write("go!");
%>
<hr>
<!--#include file="../foot.inc"-->
