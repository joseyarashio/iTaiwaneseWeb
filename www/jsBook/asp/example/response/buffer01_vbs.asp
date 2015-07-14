<%Response.Buffer=false%>
<%title="Response.Buffer的範例"%>
<!--#include file="../head.inc"-->
<hr>

由於 Response.Buffer=false，以下的文字會慢慢依序出現：

<%
// 延遲時間
Function delayFunction(n)
	for j = 1 to n	'空迴圈
	next
End function
%>

<% n=1000000 %>
<% delayFunction(n) %>
<p>跑完第一次
<% delayFunction(n) %>
<p>跑完第二次
<% delayFunction(n) %>
<p>跑完第三次

<hr>
<!--#include file="../foot.inc"-->
