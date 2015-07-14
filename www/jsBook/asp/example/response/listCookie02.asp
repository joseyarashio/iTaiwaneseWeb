<%@Language=JScript%>
<%Response.buffer=true%>
<% title = "Request.Cookies 和 Response.Cookies 的內容" %>
<!--#include file="../head.inc"-->
<hr>

<!--#include file="../listdict.inc"-->
未設定 Response.Cookie 之前：
<p><% listdict(Request.Cookies, "Request.Cookies"); %>
<p><% listdict(Response.Cookies, "Response.Cookies"); %>

<%
// 載入此網頁後，每次都設定新的小餅乾
today = new Date();
todayStr = today.toLocaleString();
Response.Cookies(todayStr) = todayStr;
%>

設定 Response.Cookie 之後：
<p><% listdict(Request.Cookies, "Request.Cookies"); %>
<p><% listdict(Response.Cookies, "Response.Cookies"); %>

<hr>
<!--#include file="../foot.inc"-->
