<%@language=JScript%>
<%title="�ϥ� Application ���󪺭p�ƺ�������²�d��"%>
<!--#include file="../head.inc"-->
<hr>

<% if (Application("Counter")==null)
	Application("Counter") = 0;	//�b JScript�A�w�]�Ȥ��O 0 %>
<h3 align=center>�z�O�� <font color=red><%=++Application("Counter")%></font> ��Q���I</h3>

<hr>
<!--#include file="../foot.inc"-->
