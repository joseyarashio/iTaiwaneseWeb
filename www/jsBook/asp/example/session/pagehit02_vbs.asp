<%title="使用 Application 與 Session 物件來防止計數資料的竄改：方法二"%>
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
	alert("你想竄改記數器？沒那麼容易喔！");
	</script>
<%End If%>
<h3 align=center>從 <font color=green><%=Application(URL&"StartTime")%></font> 以來，您是第 <font color=red><%=Application(URL)%></font> 位貴賓！</h3>

<hr>
<!--#include file="../foot.inc"-->
