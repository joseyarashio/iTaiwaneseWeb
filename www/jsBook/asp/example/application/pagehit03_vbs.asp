<%title="�W�ߥ\�઺�p�ƺ����G�H URL �� Application �����ܼƦW��"%>
<!--#include file="../head.inc"-->
<hr>

<%
url=Request.ServerVariables("URL")
Application(url) = Application(url)+1
%>
<h3 align=center>�z�O�� <font color=red><%=Application(url)%></font> ��Q���I</h3>

<hr>
<!--#include file="../foot.inc"-->
