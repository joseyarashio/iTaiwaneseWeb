<%@language=jscript%>
<%title="���A���M�Τ�ݪ��ɶ����"%>
<!--#include file="head.inc"-->
<hr>

<%
today=new Date();
Response.Write("���A�����ɶ��G<font color=green>"+today.toLocaleString()+"</font>");
%>
<br>
<script>
today=new Date();
document.writeln("�Τ�ݪ��ɶ��G<font color=red>"+today.toLocaleString()+"</font>");
</script>

<hr>
<!--#include file="foot.inc"-->
