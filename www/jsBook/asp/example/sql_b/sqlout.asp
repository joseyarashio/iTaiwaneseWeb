<% title = "SQL 查詢結果" %>
<!--#include file="../head.inc"-->
<hr>
<!--#include file="listsql.inc"-->

<% database = "basketball.mdb" %>
<% SQL = request("sql") %>

<h3>SQL 命令：<font color=green><%=SQL%></font> </h3>
<h3>查詢結果：</h3>
<center>
<% call listsql(database, SQL) %>
</center>

<hr>
<!--#include file="../foot.inc"-->
