<%@language=jscript%>
<%title="�ϥΨ�Ʃw�q�ɮר���ܲ{�b�ɶ�"%>
<!--#include file="head.inc"-->
<hr>

<p>timeFunction.js run at client:<br>
<script src="timeFunction.js"></script>
<script>
document.write('�{�b�O�u' + currentTime()+ '�v�I<br>');
document.write('���ѬO�u' + currentDay() + '�v�I<br>');
</script>

<p>timeFunction.js run at server:<br>
<script language=jscript runat=server src="timeFunction.js"></script>
<%
Response.write('�{�b�O�u' + currentTime()+ '�v�I<br>');
Response.write('���ѬO�u' + currentDay() + '�v�I<br>');
%>

<hr>
<!--#include file="foot.inc"-->
