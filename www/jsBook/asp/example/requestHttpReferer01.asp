<%@language=jscript%>
<%title="�ϥ� Request.ServerVariables �ӧ���u�s���ܥثe�������e�@�Ӻ����v"%>
<!--#include file="head.inc"-->
<hr>

<ul>
<li>�s���ܥثe�������e�@�Ӻ����G<font color=red><%=Request.ServerVariables("HTTP_REFERER")%></font>
<li>�Τ�ݩҥΪ��s�����G<font color=red><%=Request.ServerVariables("HTTP_USER_AGENT")%></font>
<li>�Τ�ݵn���ܺ������b���G<font color=red><%=Request.ServerVariables("LOGON_USER")%></font>
</ul>

<hr>
<!--#include file="foot.inc"-->
