<%title="�K�X�{�Һ���"%>
<!--#include file="../head.inc"-->

<%  
rem �������ت����i��K�X�{�ҡG
rem 1. �Y�q�L�A�h�������}�ҳQ�O�@���ؼк���
rem 2. �Y���q�L�A�h�ШD���s��J�b���B�K�X
%>

<%
If ((request("login")="jang") And (request("password")="jang") Or _
    (request("login")="roger") And (request("password")="roger") Or _
    (request("login")="jang") And (request("password")="roger")) Then
	session("secret") = true %>
	���߳q�L�{�ҡI<br>
	�������������A���I���s���C<br><br>
	<center><input type=button value='Close this window' onClick='window.close();'></center>")
	<script>
	window.opener.document.location="<%=session("target")%>";	// �������}�� target ����
	window.close();	// �����K�X�{�ҵ���
	</script>
<% else
	If Not isempty(Request.ServerVariables("HTTP_REFERER")) Then
		response.write("<p align=center>��Ʀ��~�A�Э��աG<br>")
	Else
		response.write("<p align=center>�п�J�b���B�K�X�G")
	End If
%>
	<form method=post name=form1>
	<table border=0 align=center>
	<tr>
		<td align=right>�b���G</td>
		<td><input type=text name="login" value="jang" size=20></td>
	<tr>
		<td align=right>�K�X�G</td>
		<td><input type=password name="password" value="jang" size=20></td>
	<tr>
		<td align=center colspan=2><input type=submit value="�e�X"></a></td>
	</tr>
	</table>
	</form>
<%
end If
%>

<!--#include file="../foot.inc"-->
