<%title="�Q�� ASP �L�X�j�p���P���uHello World!�v"%>
<!--#include file="head.inc"-->
<hr>

<%
For Each key in Request.ClientCertificate
  Response.Write( key & ": " & Request.ClientCertificate(key) & "<BR>")
Next
%>


<hr>
<!--#include file="foot.inc"-->
