<%@Language=JScript%>
<%
Response.Cookies("111") = "�x�_";
Response.Cookies("222") = "����";
%>
<% title = "�H JScript �L�X Request.Cookies �����e" %>
<!--#include file="../head.inc"-->
<hr>

<!--#include file="../listdict.inc"-->
<% listdict(Request.Cookies, "Request.Cookies"); %>

<hr>
<!--#include file="../foot.inc"-->
