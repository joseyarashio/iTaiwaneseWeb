<%@language=JScript%>
<%title="�ϥ� Application �P Session ����Ө���p�Ƹ�ƪ�«��G��k�@"%>
<!--#include file="../head.inc"-->
<hr>

<%
if (Application("Counter")==null)
	Application("Counter") = 0;	//�b JScript�A�w�]�Ȥ��O 0
if (Session("PreviouslyOnLine")!=true){
	Application("Counter")++;
	Session("PreviouslyOnLine") = true;
}
%>
<h3 align=center>�z�O�� <font color=red><%=Application("Counter")%></font> ��Q���I</h3>

<hr>
<!--#include file="../foot.inc"-->
