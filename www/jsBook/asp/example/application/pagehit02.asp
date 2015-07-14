<%@language=JScript%>
<%title="使用 Application 物件的計數網頁的精簡範例"%>
<!--#include file="../head.inc"-->
<hr>

<% if (Application("Counter")==null)
	Application("Counter") = 0;	//在 JScript，預設值不是 0 %>
<h3 align=center>您是第 <font color=red><%=++Application("Counter")%></font> 位貴賓！</h3>

<hr>
<!--#include file="../foot.inc"-->
