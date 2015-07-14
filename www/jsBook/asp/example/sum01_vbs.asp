<%title="¨Ï¥Î VBScript ¨ç¼Æ½d¨Ò"%>
<!--#include file="head.inc"-->
<hr>

<%
function sum(n)
	dim i, total
	total = 0
	for i = 1 to n
		total = total + i
	next
	sum = total
end function

n = 20
response.write("1+2+...+" & n & " = " & sum(n) & chr(13) & chr(10))
response.write("(Computed by server-side VBScript)")
%>

<hr>
<!!--#include file="foot.inc"-->
