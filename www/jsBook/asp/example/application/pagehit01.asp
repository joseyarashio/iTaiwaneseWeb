<%@language=JScript%>
<%title="�ϥ� Application ���󪺭p�ƺ���������d��"%>
<!--#include file="../head.inc"-->
<hr>

<%
// �Y Application("Counter") ���s�b�A�h�]�w�䬰 0
if (Application("Counter")==null)
	Application("Counter")=0;

function PageHitCounter(){
	Application.Lock;	//��� Application ����A������L�ϥΪ̧��� Application ���󪺥����T
	Application("Counter")++;
	Application.UnLock;	//�Ѱ� Lock ���A
	return(Application("Counter"));
}
%>
<h3 align=center>�z�O�� <font color=red><%=PageHitCounter()%></font> ��Q���I</h3>

<hr>
<!--#include file="../foot.inc"-->
