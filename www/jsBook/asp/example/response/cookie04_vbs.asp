<% Response.buffer = true %>
<% title = "�u���Ϳ��~�� Cookie �ϥνd�ҡv���ץ��k�G" %>
<!--#include file="../head.inc"-->
<hr>

View source: [<a href="/jang/books/webprog/common/showcode.asp?source=<%=Request.ServerVariables("URL")%>">Server script</a>]
<% Response.Cookies("xyz") = "abc" %>

<hr>
<!--#include file="../foot.inc"-->
