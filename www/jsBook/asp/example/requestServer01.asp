<%@language=jscript%>
<%title="�ϥ� Request.ServerVariables �ӦC�X�P���A����������T"%>
<!--#include file="head.inc"-->
<hr>

<ul>
<li>���A������W�١G<font color=red><%=Request.ServerVariables("SERVER_NAME")%></font>
<li>���A���𸹡G<font color=red><%=Request.ServerVariables("SERVER_PORT")%></font>
<li>���A����w�G<font color=red><%=Request.ServerVariables("SERVER_PROTOCOL")%></font>
<li>�������A���n��W�١G<font color=red><%=Request.ServerVariables("SERVER_SOFTWARE")%></font>
<li>���A���[�K�G<font color=red><%=Request.ServerVariables("SERVER_PORT_SECURE")%></font>
</ul>

<hr>
<!--#include file="foot.inc"-->
