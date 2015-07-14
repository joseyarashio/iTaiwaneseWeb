<% title="以 VBScript 進行資料庫列表：使用 listQueryResult() 函數" %>
<!--#include file="../head.inc"-->
<hr>
<!--#include file="../listQueryResult.inc"-->

<%
database="test.mdb"
sql="select * from testTable"
call listQueryResult(database, sql)
%>

<hr>
<!--#include file="../foot.inc"-->
