<%@ language="jscript" %>
<% title="�H JScript �i���Ʈw�C��G�ϥ� listQueryResult() ���" %>
<!--#include file="../head.inc"-->
<hr>

<!--#include file="../listQueryResult.inc"-->
<%
database="test.mdb";
sql="select * from testTable";
listQueryResult(database, sql);
%>

<hr>
<!--#include file="../foot.inc"-->
