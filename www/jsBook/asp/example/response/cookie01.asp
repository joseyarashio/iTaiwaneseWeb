<%@Language=JScript%>
<%
now = new Date();
expDate = new Date();
expDate.setTime(now.getTime()+365*24*60*60*1000);	// ��ƱN�Q�O�d�@�~	
x = Request.Form("userName")+"";
if (x!="undefined"){		// �Ѫ���I��Ӹ��J���� ==> �]�w�p�氮
	Response.Cookies("userName") = Request("userName");
	Response.Cookies("userName").Expires = expDate.getVarDate();	// �����ϥ� getVarDate() �N��ƫ��A�ন VARIANT
	Response.Cookies("userTime") = now.toLocaleString();
	Response.Cookies("userTime").Expires = expDate.getVarDate();	// �����ϥ� getVarDate() �N��ƫ��A�ন VARIANT
}
%>
<% title = "�ϥ� Cookie ���򥻽d��"; %>
<!--#include file="../head.inc"-->
<hr>

<%
userName = Request.Cookies("userName")+"";	// ���o�p�氮�ҰO���� userName ��T 
if (userName == ""){ %>
	�z�n���O�Ĥ@���y�X������I�ж�J�z���j�W�A���¡I
<% } else { %>
	<%=userName%></font> �z�n�I
	<br>�z�W���n���ɶ��� <%=Request.Cookies("userTime")%>�C
	<br>�p�G�z���j�W���O <%=userName%>�A�Э��s�n���C
<% } %>

<form method=post>
�j�W�G<input name="userName"> <input type=submit>
</form>
�]�z��J����T�N�|�Q�O�d�b�z���w�Ф��� Cookies�A�O�d�����@�~�C�^

<hr>
<!--#include file="../foot.inc"-->
