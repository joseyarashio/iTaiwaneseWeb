<%@language=JScript%>
<%title="�W�ߥ\�઺�p�ƺ����G�H URL �� Application �����ܼƦW��"%>
<!--#include file="../head.inc"-->
<hr>

<%
url = Request.ServerVariables("URL");
if (Application(url) == null)
	Application(url) = 0;	//�b JScript�A�w�]�Ȥ��O 0
%>
<h3 align=center>�z�O�� <font color=red><%=++Application(url)%></font> ��Q���I</h3>

<hr>
<!--#include file="../foot.inc"-->
