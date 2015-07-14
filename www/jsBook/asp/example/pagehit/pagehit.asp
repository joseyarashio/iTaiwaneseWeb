<%title="使用 Application 物件的計數網頁的完整範例"%>
<!--#include file="../head.inc"-->
<hr>

<%
Function PageHitCounter()
	Application.Lock	'鎖住 Application 物件，不讓其他使用者改變 Application 物件的任何資訊
	Application("Counter") = Application("Counter")+1
	Application.UnLock	'解除 Lock 狀態
	PageHitCounter = Application("Counter")
End Function
%>
<h3 align=center>您是第 <font color=red><%=PageHitCounter%></font> 位貴賓！</h3>

<hr>
<!--#include file="../foot.inc"-->
