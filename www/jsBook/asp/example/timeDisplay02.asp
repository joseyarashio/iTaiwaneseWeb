<%@language=jscript%>
<%title="使用函數定義檔案來顯示現在時間"%>
<!--#include file="head.inc"-->
<hr>

<p>timeFunctionRunAtClient.js:<br>
<script src="timeFunctionRunAtClient.js"></script>
<script>
document.write('現在是「' + currentTime()+ '」！<br>');
document.write('今天是「' + currentDay() + '」！<br>');
</script>

<p>timeFunctionRunAtServer.inc:<br>
<!--#include file="timeFunctionFunAtServer.inc"-->
<%
Response.write('現在是「' + currentTime()+ '」！<br>');
Response.write('今天是「' + currentDay() + '」！<br>');
%>

<hr>
<!--#include file="foot.inc"-->
