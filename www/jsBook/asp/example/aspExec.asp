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

// Create the server-side object
objExecutor = new ActiveXObject("ASPExec.Execute");

// Set the application name
objExecutor.Application = "cmd.exe" 

// Now set the parameters, very important!
// You want your DOS prompt to call your batch file
// For NT - it's "/c filename.exe"
objExecutor.Parameters = "/c d:\\users\\jang\\books\\asp\\example\\test.bat";

objExecutor.ShowWindow = false;

// Here we execute the app and get the output to this string
sResult = objExecutor.ExecuteWinApp();
Response.write("Result: " + sResult + "<p>");
%>

<hr>
<!--#include file="foot.inc"-->
