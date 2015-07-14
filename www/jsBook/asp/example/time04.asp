<%@language=jscript%>
<%title="JScript 的 Date 物件的各種方法"%>
<!--#include file="head.inc"-->
<hr>

<%
cmd=new Array();
i=0;
cmd[i++]="getDate()";
cmd[i++]="getDay()";
cmd[i++]="getHours()";
cmd[i++]="getMinutes()";
cmd[i++]="getMonth()";
cmd[i++]="getSeconds()";
cmd[i++]="getTime()";
cmd[i++]="getTimezoneOffset()";
cmd[i++]="getYear()";
cmd[i++]="toGMTString()";
cmd[i++]="toLocaleString()";

today=new Date();
for (i=0; i<cmd.length; i++){
	thisCmd="today."+cmd[i];
	Response.write(thisCmd+" ===> "+eval(thisCmd)+"<br>");
}
%>

<hr>
<!--#include file="foot.inc"-->
