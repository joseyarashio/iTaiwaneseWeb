<%
if Request.Form("userName") <> Empty then
	Response.Cookies("userName") = Request("userName")
	Response.Cookies("userName").Expires = Date + 365
	Response.Cookies("userTime") = Now
	Response.Cookies("userTime").Expires = Date + 365
end if
%>
<% title = "�ϥ� Cookie ���򥻽d��" %>
<!--#include file="../head.inc"-->
<hr>

<%
userName = Request.Cookies("userName") 
if userName = Empty then %>
	<p>�z�n���O�Ĥ@���y�X������I
	<p>�ж�J�z���j�W�A���¡I
<% else %>
	<p><font size=+2> <font color=green><%=userName%></font> �z�n!</font>
	<p>�z�W���n���ɶ���<font color=blue><%=Request.Cookies("userTime")%></font>.
	<p>�p�G�z���j�W���O <font color=green><%=userName%></font>�A�Э��s�n��.
<% end if %>

<form method=post>
�j�W�G<input name="userName">
<input type=submit>
</form>
�]�z��J����T�N�|�Q�O�d�b�z���w�Ф��� Cookies�A�O�d�����@�~�C�^

<hr>
<!--#include file="../foot.inc"-->
