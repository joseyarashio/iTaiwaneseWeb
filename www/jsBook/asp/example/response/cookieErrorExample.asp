<%@Language=JScript%>
<% Response.buffer = false %>
<html>
<body>
<% Response.Cookies("xyz") = "abc"; %>
這是網頁內容。
</body>
</html>
