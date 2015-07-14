<%@language=jscript%>
<%title="印出 Response 物件的各種性質"%>
<!--#include file="../head.inc"-->
<hr>

Response.Buffer = <%=Response.Buffer%><br>
Response.ContentType = <%=Response.ContentType%><br>
Response.Expires = <%=Response.Expires%><br>
Response.ExpiresAbsolute = <%=Response.ExpiresAbsolute%><br>
Response.Status = <%=Response.Status%><br>

<hr>
<!--#include file="../foot.inc"-->
