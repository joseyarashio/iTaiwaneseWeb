<%@language=jscript%>
<%//負責讀取目前時間的 AJAX 遠端程式%>
<%
today=new Date();
time=today.toString();
Response.write("<font color=red>"+time+"</font>");
%>
