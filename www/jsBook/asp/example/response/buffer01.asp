<%@language=JScript%>
<%Response.Buffer=false%>
<%title="Response.Buffer的範例"%>
<!--#include file="../head.inc"-->
<hr>

<%
function delayFunction(n){
	for (var j=0; j<n; j++);	// 延遲時間的空迴圈
}
n=10000000;
%>
由於 Response.Buffer=false，以下的文字會慢慢依序出現：
<% delayFunction(n) %><p>跑完第一次
<% delayFunction(n) %><p>跑完第二次
<% delayFunction(n) %><p>跑完第三次

<hr>
<!--#include file="../foot.inc"-->
