<%title="�ϥ� Application ���󪺭p�ƺ���������d��"%>
<!--#include file="../head.inc"-->
<hr>

<%
Function PageHitCounter()
	Application.Lock	'��� Application ����A������L�ϥΪ̧��� Application ���󪺥����T
	Application("Counter") = Application("Counter")+1
	Application.UnLock	'�Ѱ� Lock ���A
	PageHitCounter = Application("Counter")
End Function
%>
<h3 align=center>�z�O�� <font color=red><%=PageHitCounter%></font> ��Q���I</h3>

<hr>
<!--#include file="../foot.inc"-->
