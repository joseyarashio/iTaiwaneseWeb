<%@Language=JScript%>
<%  Response.buffer = true; %>
<% title = "Request.Cookies 和 Response.Cookies 的內容" %>
<!--#include file="../head.inc"-->
<!--#include file="../listdict.inc"-->
<hr>

未設定 Response.Cookie 之前：
<p><% listdict(Request.Cookies, "Request.Cookies"); %>
<p><% listdict(Response.Cookies, "Response.Cookies"); %>


<%
now = new Date();
now = now.toLocaleString();
Response.Cookies(now) = now;	// 每次都產生一個新的 cookie
%>

設定 Response.Cookie 之後：
<p><% listdict(Request.Cookies, "Request.Cookies"); %>
<p><% listdict(Response.Cookies, "Response.Cookies"); %>

<hr>
<!--#include file="../foot.inc"-->
