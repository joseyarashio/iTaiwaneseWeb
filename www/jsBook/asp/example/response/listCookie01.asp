<%@Language=JScript%>
<%
Response.Cookies("111") = "台北";
Response.Cookies("222") = "高雄";
%>
<% title = "以 JScript 印出 Request.Cookies 的內容" %>
<!--#include file="../head.inc"-->
<hr>

<!--#include file="../listdict.inc"-->
<% listdict(Request.Cookies, "Request.Cookies"); %>

<hr>
<!--#include file="../foot.inc"-->
