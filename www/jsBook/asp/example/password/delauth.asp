<%@language=jscript%>
<%
// ���������Ȭ������{�Ҹ�T�]�Y�N�ܼ� session("ok")�]�w�� False�^�A�ø��J source.asp ����
Session("ok") = false;
Response.Redirect(Session("source"));
%>
