
<%
Response.Cookies("1") = "a"
Response.Cookies("1").Expires = #01-01-2000#
Response.Cookies("2") = "b"
Response.Cookies("3") = "c"
Response.Cookies("4") = "d"
Response.Cookies("5") = "e"
%>
<% title = "以 VBScript 印出 Request.Cookies 的內容" %>
<!--#include file="../head.inc"-->
<hr>

<!--#include file="../listdict.inc"-->
<p><% listdict Request.Cookies, "Request.Cookies" %>

<hr>
<!--#include file="../foot.inc"-->
