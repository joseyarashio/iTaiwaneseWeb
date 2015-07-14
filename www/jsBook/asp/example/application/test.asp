<%@language=JScript%>
<%title="使用 Application 物件的計數網頁的精簡範例"%>
<!--#include file="../head.inc"-->
<hr>

<h3 align=center>您是第 <font color=red><%=++Application("abc")%></font> 位貴賓！</h3>

<hr>
<!--#include file="../foot.inc"-->
