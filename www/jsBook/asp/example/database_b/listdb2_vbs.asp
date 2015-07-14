<% title="以 VBScript 進行資料庫列表" %>
<!--#include file="../head.inc"-->
<hr>
<!--#include file="listdb.inc"-->
<%
database="test.mdb"
sql="select * from test"
call listQueryResult(database, sql)
%>

<p align=center>
相關網頁：<a href="listdb2.asp">以 JScript 進行資料庫列表</a>

<hr>
<!--#include file="../foot.inc"-->
