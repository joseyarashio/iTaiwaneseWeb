<% title="�H VBScript �i���Ʈw�C��" %>
<!--#include file="../head.inc"-->
<hr>
<!--#include file="listdb.inc"-->
<%
database="test.mdb"
sql="select * from test"
call listQueryResult(database, sql)
%>

<p align=center>
���������G<a href="listdb2.asp">�H JScript �i���Ʈw�C��</a>

<hr>
<!--#include file="../foot.inc"-->
