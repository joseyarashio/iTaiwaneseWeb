<%@language=JScript%>
<%Response.Expires=100000;%>
<%title="Response.IsClientConnected ���d��"%>
<!--#include file="../head.inc"-->

<hr>
<%
if (Response.IsClientConnected)
	Response.Write("�ϥΪ̤��b�s�u�I");
else
	Response.Write("�ϥΪ̤w�g���}�F�I");
%>

<p>�ЦP�������G�p������ Response.Expires ���\��H
<hr>
<!--#include file="../foot.inc"-->
