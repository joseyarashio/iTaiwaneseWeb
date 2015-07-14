<%@Language=JScript%>
<%
Response.Cookies("1")("1") = "1.1";
Response.Cookies("1")("2") = "1.2";
%>
<% title = "以 JScript 印出 Request.Cookies 的內容" %>
<!--#include file="../head.inc"-->
<hr>

<!--#include file="../listdict.inc"-->
<p><%=Response.buffer%>
<p><% listdict(Request.Cookies, "Request.Cookies"); %>
<p><% listdict(Response.Cookies, "Response.Cookies"); %>
<p><% listdict(Request.Cookies("1"), "Request.Cookies(\"1\")"); %>

<hr>
<!--#include file="../foot.inc"-->
