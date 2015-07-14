<%@language=JScript%>
<%title="使用 Application 與 Session 物件來防止計數資料的竄改：方法一"%>
<!--#include file="../head.inc"-->
<hr>

<%
if (Application("Counter")==null)
	Application("Counter") = 0;	//在 JScript，預設值不是 0
if (Session("PreviouslyOnLine")!=true){
	Application("Counter")++;
	Session("PreviouslyOnLine") = true;
}
%>
<h3 align=center>您是第 <font color=red><%=Application("Counter")%></font> 位貴賓！</h3>

<hr>
<!--#include file="../foot.inc"-->
