<%@language=JScript%>
<%Response.Expires=100000;%>
<%title="Response.IsClientConnected 的範例"%>
<!--#include file="../head.inc"-->

<hr>
<%
if (Response.IsClientConnected)
	Response.Write("使用者仍在連線！");
else
	Response.Write("使用者已經離開了！");
%>

<p>請同學幫忙：如何驗證 Response.Expires 的功能？
<hr>
<!--#include file="../foot.inc"-->
