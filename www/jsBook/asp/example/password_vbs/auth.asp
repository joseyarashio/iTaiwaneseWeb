<%title="�K�X�{�Һ���"%>
<!--#include file="../head.inc"-->
<hr>
<%  
' �������ت����i��K�X�{�ҡG
' 1. �Y�q�L�A�h�������}�ҳQ�O�@�� target.asp ����
' 2. �Y���q�L�A�h�ШD���s��J�b���B�K�X

If ((request("login")="jang") And (request("password")="jang")) Then
	session("secret") = true %>
	<script>
	window.opener.document.location="<%=session("target")%>";	// �������}�� target ����
	window.close();							// �����K�X�{�ҵ���
	</script>
<% else
	If Not isempty(Request.ServerVariables("HTTP_REFERER")) Then	' �� window.open() �Ҷ}�A�S�� referer
		response.write("<p align=center>��Ʀ��~�A�Э��աG<br>")
	End If
%>
	<form method=post>
	<table border=0 align=center>
	<tr><td align=right>�b���G<td><input name="login" value="jang">
	<tr><td align=right>�K�X�G<td><input type=password name="password" value="jang">
	<tr><td align=center colspan=2><input type=submit></a>
	</table>
	</form>
<%
end If
%>
<hr>
<!--#include file="../foot.inc"-->
