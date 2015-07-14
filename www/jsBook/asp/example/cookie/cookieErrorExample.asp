<%@Language=JScript%>
<%title="Cookie使用方法錯誤的範例"%>
<% Response.buffer = false %>
<html>
<body>
<% Response.Cookies("xyz") = "abc"; %>
這是網頁內容。
</body>
</html>
