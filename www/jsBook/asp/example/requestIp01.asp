<%@language=jscript%>
<%title="�ϥ� Request.ServerVariables �ӧ�� IP"%>
<!--#include file="head.inc"-->
<hr>

<li>HTTP request �ӷ� IP: <font color=red><%=Request.ServerVariables("REMOTE_ADDR")%></font>
<li>HTTP request ���A�� IP: <font color=red><%=Request.ServerVariables("LOCAL_ADDR")%></font>
<li>HTTP request �N�z���A��: <font color=red><%=Request.ServerVariables("HTTP_VIA")%></font>
<li>HTTP request ��l�ӷ� IP: <font color=red><%=Request.ServerVariables("HTTP_X_FORWARDED_FOR")%></font>

<hr>
<!--#include file="foot.inc"-->
