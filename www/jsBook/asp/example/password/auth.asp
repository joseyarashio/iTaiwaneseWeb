<%@language=jscript%>
<%title="�K�X�{�Һ���"%>
<!--#include file="../head.inc"-->
<hr>
<%  
// �������ت����i��K�X�{�ҡG
// 1. �Y�q�L�A�h�������}�ҳQ�O�@�� target.asp ����
// 2. �Y���q�L�A�h�ШD���s��J�b���B�K�X

login=Request("login")+"";
password=Request("password")+"";
if ((login=="jang") && (password=="jang")){
	Session("ok") = true; %>
	<script>
	window.opener.document.location="<%=Session("target")%>";	// �������}�� target ����
	window.close();							// �����K�X�{�ҵ���
	</script>
<% } else {
//	if ((Request.ServerVariables("HTTP_REFERER")+"")!="undefined")	// �������e�X��I�s�ۤv�]�Y�� window.open() �Ҷ}�A�S�� referer�^
	if ((login!="undefined") && (password!="undefined"))		// �������e�X��I�s�ۤv
		Response.Write("<p align=center>��Ʀ��~�A�Э��աG<br>");
%>
	<form method=post>
	<table border=0 align=center>
	<tr><td align=right>�b���G<td><input name="login" value="jang">
	<tr><td align=right>�K�X�G<td><input type=password name="password" value="jang">
	<tr><td align=center colspan=2><input type=submit></a>
	</table>
	</form>
<%
}
%>
<hr>
