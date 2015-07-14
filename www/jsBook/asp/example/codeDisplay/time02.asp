<%@language=jscript%>
<%title="伺服器和用戶端的時間比較"%>
<!--#include file="head.inc"-->
<hr>

<%
today=new Date();
Response.Write("伺服器的時間：<font color=green>"+today.toLocaleString()+"</font>");
%>
<br>
<script>
today=new Date();
document.writeln("用戶端的時間：<font color=red>"+today.toLocaleString()+"</font>");
</script>

<hr>
<!--#include file="foot.inc"-->
