<%@language=jscript%>
<%title="�ϥΨ�Ʃw�q�ɮר���ܲ{�b�ɶ�"%>
<!--#include file="head.inc"-->
<hr>

<p>timeFunctionRunAtClient.js:<br>
<script src="timeFunctionRunAtClient.js"></script>
<script>
document.write('�{�b�O�u' + currentTime()+ '�v�I<br>');
document.write('���ѬO�u' + currentDay() + '�v�I<br>');
</script>

<p>timeFunctionRunAtServer.inc:<br>
<!--#include file="timeFunctionFunAtServer.inc"-->
<%
Response.write('�{�b�O�u' + currentTime()+ '�v�I<br>');
Response.write('���ѬO�u' + currentDay() + '�v�I<br>');
%>

<hr>
<!--#include file="foot.inc"-->
