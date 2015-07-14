<%@ language="jscript" %>
<% title="¦C¥X password.mdb" %>
<!--#include file="../head.inc"-->
<hr>

<!--#include file="../listQueryResult.inc"-->
<%
database="password.mdb";
sql="select * from password";
listQueryResult(database, sql);
%>

<hr>
<!--#include file="../foot.inc"-->
