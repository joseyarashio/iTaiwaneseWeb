<% title = "SQL �d�ߵ��G" %>
<!--#include file="../head.inc"-->
<hr>
<!--#include file="listsql.inc"-->

<% database = "basketball.mdb" %>
<% SQL = request("sql") %>

<h3>SQL �R�O�G<font color=green><%=SQL%></font> </h3>
<h3>�d�ߵ��G�G</h3>
<center>
<% call listsql(database, SQL) %>
</center>

<hr>
<!--#include file="../foot.inc"-->
