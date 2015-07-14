<%@language=jscript%>
<%title="依照伺服器時間來回傳不同的問候語"%>
<!--#include file="head.inc"-->
<hr>

<% today=new Date(); %>
伺服器端的現在時間：<font color=green><%=today.toLocaleString()%></font><br>
<p>

<script src=time.js></script>
<script>
document.writeln(currentTime());
</script>

<%
<!--#include file="time.js"-->
%>
<%
//Response.Write(currentTime());
%>

<hr>
<!--#include file="foot.inc"-->
