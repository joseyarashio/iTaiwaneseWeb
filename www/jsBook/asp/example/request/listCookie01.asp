<%@Language=JScript%>
<%
today= new Date();
Response.Cookies("111") = today.toLocaleString();
Response.Cookies("222") = "bbb";
%>
<% title = "�H JScript �L�X Request.Cookies �����e" %>
<!--#include file="../head.inc"-->
<hr>

<!--#include file="../listdict.inc"-->
<% listdict(Request.Cookies, "Request.Cookies"); %>

<hr>
<!--#include file="../foot.inc"-->
