<%@language=jscript%>
<%title="�̷Ӧ��A���ɶ��Ӧ^�Ǥ��P���ݭԻy"%>
<!--#include file="head.inc"-->
<hr>

<% today=new Date(); %>
���A���ݪ��{�b�ɶ��G<font color=green><%=today.toLocaleString()%></font><p>
<%
time=today.getHours();
if ((12<=time) && (time<2))
	greeting = "�w�g���F�A�ӺΤF!";
else if ((2<=time) && (time<4))
	greeting = "�z�n����ѫG�ܡH�ֺΧa!"
else if ((4<=time) && (time<6))
	greeting = "�ѧ֫G�F! �z�O���_������A�٬O�ߺΪ��Ψ�?"
else if ((6<=time) && (time<8))
	greeting = "�z��! �@�j�M���z�N�b��sASP�A�믫�O�H�P��!"
else if ((8<=time) && (time<10))
	greeting = "�z��! ���W��sASP���ĪG�̦n�A�z���O��?"
else if ((10<=time) && (time<12))
	greeting = "�Y���ɶ��֨�F�A�z�j�F��?"
else if ((12<=time) && (time<13))
	greeting = "�Y���F��?�O�ѤF�Y����!"
else if ((13<=time) && (time<14))
	greeting = "�Ȧw...�Ⱥήɶ��A�O�n��!"
else if ((14<=time) && (time<16))
	greeting = "�Ȧw! �z��ı�ΰ��ܡH�O�εۤF!"
else if ((16<=time) && (time<18))
	greeting = "�B�ʮɶ��A�O�u�@�F!"
else if ((18<=time) && (time<20))
	greeting = "�z�Y�L���\�F��?�ӦY���F!"
else if ((20<=time) && (time<22))
	greeting = "�ߦw! �z�Y�L���\�F��?"
else if ((22<=time) && (time<24))
	greeting = "�ߦw! �Ӻ�ı�F!"
else
	greeting = "�z�n!"
%>
<font size=+2><%= greeting %></font>

<hr>
<!--#include file="foot.inc"-->
