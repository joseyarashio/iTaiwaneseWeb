<!--#include file="listsql.inc"-->
<% title = "SQL Query Results" %>
<% database = "baseball.mdb" %>
<% table1 = "Players" %>
<% table2 = "Teams" %>
<% SQL = request("sql") %>
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
<TITLE><%=title%></TITLE>
</head>

<body background="/jang/graphics/background/paper.jpg">
<h2 align=center><%=title%></h2>
<hr>

<h3> SQL Command: <font color=green><%=SQL%></font> </h3>
<h3> Results: </h3>
<center>
<% call listsql(database, SQL) %>
</center>

<hr>
<!--#include file="footnote.inc"-->

<body>
</html>
