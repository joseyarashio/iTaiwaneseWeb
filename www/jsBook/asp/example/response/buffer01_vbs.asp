<%Response.Buffer=false%>
<%title="Response.Buffer���d��"%>
<!--#include file="../head.inc"-->
<hr>

�ѩ� Response.Buffer=false�A�H�U����r�|�C�C�̧ǥX�{�G

<%
// ����ɶ�
Function delayFunction(n)
	for j = 1 to n	'�Űj��
	next
End function
%>

<% n=1000000 %>
<% delayFunction(n) %>
<p>�]���Ĥ@��
<% delayFunction(n) %>
<p>�]���ĤG��
<% delayFunction(n) %>
<p>�]���ĤT��

<hr>
<!--#include file="../foot.inc"-->
