<%@Language=JScript%>
<% Response.Cookies("xyz") = "abc"; %>
<% title = "「產生錯誤的 Cookie 使用範例」的修正法一" %>
<!--#include file="../head.inc"-->
<hr>

View source: [<a href="/jang/books/webprog/common/showcode.asp?source=<%=Request.ServerVariables("URL")%>">Server script</a>]

<hr>
<!--#include file="../foot.inc"-->
