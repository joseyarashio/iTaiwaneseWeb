<%@Language=JScript%>
<%  Response.buffer = true; %>
<% title = "Request.Cookies �M Response.Cookies �����e" %>
<!--#include file="../head.inc"-->
<!--#include file="../listdict.inc"-->
<hr>

���]�w Response.Cookie ���e�G
<p><% listdict(Request.Cookies, "Request.Cookies"); %>
<p><% listdict(Response.Cookies, "Response.Cookies"); %>


<%
now = new Date();
now = now.toLocaleString();
Response.Cookies(now) = now;	// �C�������ͤ@�ӷs�� cookie
%>

�]�w Response.Cookie ����G
<p><% listdict(Request.Cookies, "Request.Cookies"); %>
<p><% listdict(Response.Cookies, "Response.Cookies"); %>

<hr>
<!--#include file="../foot.inc"-->
