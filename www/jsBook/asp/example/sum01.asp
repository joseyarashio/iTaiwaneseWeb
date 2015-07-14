<%@language=jscript%>
<%title="¨Ï¥Î JScript ¨ç¼Æ½d¨Ò"%>
<!--#include file="head.inc"-->
<hr>

<%
function sum(n) {
	var i, total=0;
	for (i=1; i<=n; i++)
		total = total + i;
	return(total);
}

n = 20;
Response.write("1+2+...+" + n + " = " + sum(n) + "\n");
Response.write("(Computed by server-side JScript)");
%>

<hr>
<!--#include file="foot.inc"-->
