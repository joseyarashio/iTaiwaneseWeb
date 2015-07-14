<%@language=JScript%>
<%title="如何解析 Request.QueryString 表單資料的重複欄位"%>
<!--#include file="../head.inc"-->
<hr>

<table border=1 align=center>
<tr>
<th bgcolor=999999>Name<th bgcolor=999999>出現次數<th bgcolor=999999>解析結果</tr> 
<%
var Enum=new Enumerator(Request.QueryString);
for (Enum.moveFirst(); !Enum.atEnd(); Enum.moveNext()){
	Response.Write("<tr>");
	Response.Write("<td>"+Enum.item());
	Response.Write("<td>"+Request.QueryString(Enum.item()).count);
	Response.Write("<td>Request.QueryString("+Enum.item()+")="+Request.QueryString(Enum.item())+"<br>");
	for (i=1; i<=Request.QueryString(Enum.item()).count; i++)
		Response.Write("Request.QueryString("+Enum.item()+")("+i+")="+Request.QueryString(Enum.item())(i)+"<br>");
}
%>   
</table>

<hr>
<!--#include file="../foot.inc"-->
