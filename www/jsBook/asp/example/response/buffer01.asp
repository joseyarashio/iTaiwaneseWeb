<%@language=JScript%>
<%Response.Buffer=false%>
<%title="Response.Buffer���d��"%>
<!--#include file="../head.inc"-->
<hr>

<%
function delayFunction(n){
	for (var j=0; j<n; j++);	// ����ɶ����Űj��
}
n=10000000;
%>
�ѩ� Response.Buffer=false�A�H�U����r�|�C�C�̧ǥX�{�G
<% delayFunction(n) %><p>�]���Ĥ@��
<% delayFunction(n) %><p>�]���ĤG��
<% delayFunction(n) %><p>�]���ĤT��

<hr>
<!--#include file="../foot.inc"-->
