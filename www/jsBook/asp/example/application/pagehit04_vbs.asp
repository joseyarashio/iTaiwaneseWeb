<%title="��ܭp�ƾ��Ұʮɶ����d��"%>
<!--#include file="../head.inc"-->
<hr>

<%
URL = Request.ServerVariables("URL")
startTime = URL & "startTime"
If Application(URL) = Empty Then
	Application(startTime) = now
End If
Application(URL)=Application(URL)+1
%>
<h3 align=center>�q <font color=green><%=Application(startTime)%></font> �H�ӡA�z�O�� <font color=red><%=Application(URL)%></font> ��Q���I</h3>

<hr>
<!--#include file="../foot.inc"-->
