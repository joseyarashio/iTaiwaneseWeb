<%title="�ϥ� Application �P Session ����Ө���p�Ƹ�ƪ�«��G��k�G"%>
<!--#include file="../head.inc"-->
<hr>

<%
URL = Request.ServerVariables("URL")
If Application(URL) = Empty Then
	Application(URL&"StartTime") = now
End If
If Session(URL) = Empty Then
	Application(URL)=Application(URL)+1
	Session(URL) = "junk"
Else %>
	<script>
	alert("�A�Q«��O�ƾ��H�S����e����I");
	</script>
<%End If%>
<h3 align=center>�q <font color=green><%=Application(URL&"StartTime")%></font> �H�ӡA�z�O�� <font color=red><%=Application(URL)%></font> ��Q���I</h3>

<hr>
<!--#include file="../foot.inc"-->
