<%@language=jscript%>
<%title="�̷Ӧ��A���ɶ��Ӧ^�Ǥ��P���ݭԻy"%>
<!--#include file="head.inc"-->
<hr>

<% today=new Date(); %>
���A���ݪ��{�b�ɶ��G<font color=green><%=today.toLocaleString()%></font><br>
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
