<%@language=jscript%>
<%title="�ϥ� Request.ServerVariables �ӦC�X�P�������|��������T"%>
<!--#include file="head.inc"-->
<hr>

<ul>
<li>���A���ڥؿ�������w�и��|�G<font color=red><%=Request.ServerVariables("APPL_PHYSICAL_PATH")%></font>
<li>�����b����w�Ъ����|�G<font color=red><%=Request.ServerVariables("PATH_TRANSLATED")%></font>
<li>�����۹�������A���ڥؿ������|�G<font color=red><%=Request.ServerVariables("PATH_INFO")%></font>
<li>�����۹�������A���ڥؿ������|�G<font color=red><%=Request.ServerVariables("SCRIPT_NAME")%></font>
<li>�����۹�������A���ڥؿ������|�G<font color=red><%=Request.ServerVariables("URL")%></font>
</ul>

<hr>
<!--#include file="foot.inc"-->
