<%
rem ���������Ȭ������{�Ҹ�T�]�Y�N�ܼ� session("secret")�]�w�� False�^�A�ø��J source.asp ����
session("secret") = false
response.redirect(session("source"))
%>
