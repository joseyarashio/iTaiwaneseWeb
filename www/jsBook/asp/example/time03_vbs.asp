<%title="�̷Ӧ��A���ɶ��Ӧ^�Ǥ��P���ݭԻy�]VBScript�^"%>
<!--#include file="head.inc"-->
<hr>
<p>
Time: <font color=green><%=time%></font><br>
Date: <font color=green><%=date%></font><br>
Now:  <font color=green><%=now%></font><br>
<p>
<%
if #12:00:00 am# <= time and time < #2:00:00 am# then
	greeting = "�w�g���F�A�ӺΤF!"
elseif #2:00:00 am# <= time and time < #4:00:00 am# then
	greeting = "�z�n����ѫG�ܡH�ֺΧa!"
elseif #4:00:00 am# <= time and time < #6:00:00 am# then
	greeting = "�ѧ֫G�F! �z�O���_������A�٬O�ߺΪ��Ψ�?"
elseif #6:00:00 am# <= time and time < #8:00:00 am# then
	greeting = "�z��! �@�j�M���z�N�b��sASP�A�믫�O�H�P��!"
elseif #8:00:00 am# <= time and time < #10:00:00 am# then
	greeting = "�z��! ���W��sASP���ĪG�̦n�A�z���O��?"
elseif #10:00:00 am# <= time and time < #12:00:00 pm# then
	greeting = "�Y���ɶ��֨�F�A�z�j�F��?"
elseif #12:00:00 pm# <= time and time < #1:00:00 pm# then
	greeting = "�Y���F��?�O�ѤF�Y����!"
elseif #1:00:00 pm# <= time and time < #2:00:00 pm# then
	greeting = "�Ȧw...�Ⱥήɶ��A�O�n��!"
elseif #2:00:00 pm# <= time and time < #4:00:00 pm# then
	greeting = "�Ȧw! �z��ı�ΰ��ܡH�O�εۤF!"
elseif #4:00:00 pm# <= time and time < #6:00:00 pm# then
	greeting = "�B�ʮɶ��A�O�u�@�F!"
elseif #6:00:00 pm# <= time and time < #8:00:00 pm# then
	greeting = "�z�Y�L���\�F��?�ӦY���F!"
elseif #8:00:00 pm# <= time and time < #10:00:00 pm# then
	greeting = "�ߦw! �z�Y�L���\�F��?"
elseif #10:00:00 pm# <= time and time < #12:00:00 am# then
	greeting = "�ߦw! �Ӻ�ı�F!"
else
	greeting = "�z�n!"
end if
%>
<font size=+2>
<%= greeting %>
</font>

<hr>
<!--#include file="foot.inc"-->
