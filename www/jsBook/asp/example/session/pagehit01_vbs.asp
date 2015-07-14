<%title="使用 Application 與 Session 物件來防止計數資料的竄改：方法一"%>
<!--#include file="../head.inc"-->
<hr>

<%
If Not Session("PreviouslyOnLine") Then
	Application("Counter") = Application("Counter")+1
	Session("PreviouslyOnLine") = True
End If
%>
<h3 align=center>您是第 <font color=red><%=Application("Counter")%></font> 位貴賓！</h3>

<hr>
<!--#include file="../foot.inc"-->
