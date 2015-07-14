<%@language=JScript%>
<%title="使用 Application 物件的計數網頁的完整範例"%>
<!--#include file="../head.inc"-->
<hr>

<%
// 若 Application("Counter") 不存在，則設定其為 0
if (Application("Counter")==null)
	Application("Counter")=0;

function PageHitCounter(){
	Application.Lock;	//鎖住 Application 物件，不讓其他使用者改變 Application 物件的任何資訊
	Application("Counter")++;
	Application.UnLock;	//解除 Lock 狀態
	return(Application("Counter"));
}
%>
<h3 align=center>您是第 <font color=red><%=PageHitCounter()%></font> 位貴賓！</h3>

<hr>
<!--#include file="../foot.inc"-->
