<%@Language=JScript%>
<%
now = new Date();
expDate = new Date();
expDate.setTime(now.getTime()+365*24*60*60*1000);	// ��ƱN�Q�O�d�@�~	
//expDate.setMonth(expDate.getMonth() + 12);	// ��ƱN�Q�O�d 12 �Ӥ�
x = Request.Form("userName")+"";
if (x!="undefined"){
	Response.Cookies("userName") = Request("userName");
	Response.Cookies("userName").Expires = expDate.getVarDate();	// �����ϥ� getVarDate() �N��ƫ��A�ন VARIANT
	Response.Cookies("userTime") = now;
	Response.Cookies("userTime").Expires = expDate.getVarDate();	// �����ϥ� getVarDate() �N��ƫ��A�ন VARIANT
}
%>
<% title = "�ϥ� Cookie ���򥻽d��"; %>
<!--#include file="../head.inc"-->
<hr>

<%
userName = Request.Cookies("userName")+""; 
if (userName == ""){ %>
	<p>�z�n���O�Ĥ@���y�X������I
	<p>�ж�J�z���j�W�A���¡I
<% } else { %>
	<p><font size=+2> <font color=green><%=userName%></font> �z�n!</font>
	<p>�z�W���n���ɶ���<font color=blue><%=Request.Cookies("userTime")%></font>.
	<p>�p�G�z���j�W���O <font color=green><%=userName%></font>�A�Э��s�n��.
<% } %>

<form method=post>
�j�W�G<input name="userName">
<input type=submit>
</form>
�]�z��J����T�N�|�Q�O�d�b�z���w�Ф��� Cookies�A�O�d�����@�~�C�^

<hr>
<!--#include file="../foot.inc"-->
