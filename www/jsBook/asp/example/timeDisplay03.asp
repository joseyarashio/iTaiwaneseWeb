<%@language=jscript%>
<%title="使用函數定義檔案來顯示現在時間"%>
<!--#include file="head.inc"-->
<hr>

<p>timeFunction.js run at client:<br>
<script src="timeFunction.js"></script>
<script>
document.write('現在是「' + currentTime()+ '」！<br>');
document.write('今天是「' + currentDay() + '」！<br>');
</script>

<p>timeFunction.js run at server:<br>
<script language=jscript runat=server src="timeFunction.js"></script>
<%
Response.write('現在是「' + currentTime()+ '」！<br>');
Response.write('今天是「' + currentDay() + '」！<br>');
%>

<hr>
<!--#include file="foot.inc"-->
