<%title="�W�ߥ\�઺�p�ƺ����G�H URL �� Application �����ܼƦW��"%>
<!--#include file="../head.inc"-->
<hr>

<%
URL=Request.ServerVariables("URL")
Application(URL) = Application(URL)+1
%>
<h3 align=center>�z�O�� <font color=red><%=Application(URL)%></font> ��Q���I</h3>

<hr>
<!--#include file="../foot.inc"-->
