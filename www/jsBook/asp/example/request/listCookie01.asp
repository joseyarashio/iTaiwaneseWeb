<%@Language=JScript%>
<%
today= new Date();
Response.Cookies("111") = today.toLocaleString();
Response.Cookies("222") = "bbb";
%>
<% title = "以 JScript 印出 Request.Cookies 的內容" %>
<!--#include file="../head.inc"-->
<hr>

<!--#include file="../listdict.inc"-->
<% listdict(Request.Cookies, "Request.Cookies"); %>

<hr>
<!--#include file="../foot.inc"-->
