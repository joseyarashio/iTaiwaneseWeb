<%
rem ���������Ȭ������{�Ҹ�T�]�Y�N�ܼ� session("secret")�]�w�� False�^�A�ø��J�ӷ�����
session("secret") = FALSE
response.redirect(session("source"))
%>
