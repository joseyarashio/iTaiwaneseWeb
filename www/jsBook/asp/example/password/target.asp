<%@language=jscript%>
<!--#include file="auth.inc"-->
<%title = "���K����" %>
<!--#include file="../head.inc"-->
<hr>

<p align=center>�z�w���\�n�J���K�����I</h3>
<p align=center>�������� "target.asp"�A���� session �ܼƦp�U�G
<br>Session("source") = <%=Session("source")%>
<br>Session("target") = <%=Session("target")%>

<p align=center>
<a href="delauth.asp">�����{�Ҹ�T</a><br>

<hr>
<!--#include file="../foot.inc"-->
