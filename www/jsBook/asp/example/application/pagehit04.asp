<%@language=JScript%>
<%title="��ܭp�ƾ��Ұʮɶ����d��"%>
<!--#include file="../head.inc"-->
<hr>

<%
url = Request.ServerVariables("URL");
startTime = "startTime: " + url;
if (Application(startTime) == null){
	Application(url) = 0;	//�b JScript�A�w�]�Ȥ��O 0
	now = new Date();
	Application(startTime) = now.toLocaleString();
}
%>
<h3 align=center>�q <font color=green><%=Application(startTime)%></font> �H�ӡA�z�O�� <font color=red><%=++Application(url)%></font> ��Q���I</h3>

<hr>
<!--#include file="../foot.inc"-->
