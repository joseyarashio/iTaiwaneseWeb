<%title="利用 ASP 印出大小不同的「Hello World!」"%>
<!--#include file="head.inc"-->
<hr>

<%
For Each key in Request.ClientCertificate
  Response.Write( key & ": " & Request.ClientCertificate(key) & "<BR>")
Next
%>


<hr>
<!--#include file="foot.inc"-->
