<%@ language="jscript" %>
<% title = "使用 ASP 及 SQL 對資料庫進行資料查詢" %>
<!--#include file="../head.inc"-->
<hr>
<% database = "basketball.mdb"; %>
<% table1 = "Player"; %>
<% table2 = "Team"; %>

<h3>資料庫內容：</h3>

<%Response.Write(Server.MapPath("student.mdb"));%>

<hr>
<!--#include file="../foot.inc"-->
