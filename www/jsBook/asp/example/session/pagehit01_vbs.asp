<%title="�ϥ� Application �P Session ����Ө���p�Ƹ�ƪ�«��G��k�@"%>
<!--#include file="../head.inc"-->
<hr>

<%
If Not Session("PreviouslyOnLine") Then
	Application("Counter") = Application("Counter")+1
	Session("PreviouslyOnLine") = True
End If
%>
<h3 align=center>�z�O�� <font color=red><%=Application("Counter")%></font> ��Q���I</h3>

<hr>
<!--#include file="../foot.inc"-->
