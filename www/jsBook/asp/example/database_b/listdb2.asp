<%@ language="jscript" %>
<% title="�H JScript �i���Ʈw�C��" %>
<!--#include file="../head.inc"-->
<hr>
<!--#include file="listdb.inc"-->

<%
database="test.mdb";
sql="select * from test";
listdb(database, sql);
%>

<p align=center>
���������G<a href="listdb2_vbs.asp">�H VBScript �i���Ʈw�C��</a>

<hr>
<!--#include file="../foot.inc"-->
