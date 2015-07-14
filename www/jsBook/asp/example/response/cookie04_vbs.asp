<% Response.buffer = true %>
<% title = "「產生錯誤的 Cookie 使用範例」的修正法二" %>
<!--#include file="../head.inc"-->
<hr>

View source: [<a href="/jang/books/webprog/common/showcode.asp?source=<%=Request.ServerVariables("URL")%>">Server script</a>]
<% Response.Cookies("xyz") = "abc" %>

<hr>
<!--#include file="../foot.inc"-->
