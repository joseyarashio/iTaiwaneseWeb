<%@language=jscript%>
<%title="�������s���������� IP"%>
<!--#include file="head.inc"-->
<hr>

<%
ip=Request.ServerVariables("REMOTE_ADDR")+"";
proxy=Request.ServerVariables("HTTP_VIA")+"";
if (proxy!="undefined")		// �Y���ϥΥN�z���A���A�h�����l�Τ�� IP
	ip=Request.ServerVariables("HTTP_X_FORWARDED_FOR")+"";
Response.write("��l�Τ�� IP = " + ip + "<br>");
Response.write("Proxy = " + proxy + "<br>");
domain="140.114.";
if (ip.indexOf(domain)!=0){
	Response.write("This page is not allowed!");
	Response.end;	// ��������ǰe�I
}
%>

�o�O�M�j�H����ݨ쪺���`�����I

<hr>
<!--#include file="foot.inc"-->
