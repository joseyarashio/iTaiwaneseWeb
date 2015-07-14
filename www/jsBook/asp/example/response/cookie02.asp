<%@Language=JScript%>
<% Response.buffer = false %>
<% title = "產生錯誤的 Cookie 使用範例" %>
<!--#include file="../head.inc"-->
<hr>

這是網頁內容。
<% Response.Cookies("xyz") = "abc"; %>

<hr>
<!--#include file="../foot.inc"-->
