<%@Language=JScript%>
<% Response.buffer = false %>
<% title = "���Ϳ��~�� Cookie �ϥνd��" %>
<!--#include file="../head.inc"-->
<hr>

�o�O�������e�C
<% Response.Cookies("xyz") = "abc"; %>

<hr>
<!--#include file="../foot.inc"-->
