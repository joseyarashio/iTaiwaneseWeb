<%@language=jscript%>
<%title="使用 Request.ServerVariables 來列出與伺服器相關的資訊"%>
<!--#include file="head.inc"-->
<hr>

<ul>
<li>伺服器網域名稱：<font color=red><%=Request.ServerVariables("SERVER_NAME")%></font>
<li>伺服器埠號：<font color=red><%=Request.ServerVariables("SERVER_PORT")%></font>
<li>伺服器協定：<font color=red><%=Request.ServerVariables("SERVER_PROTOCOL")%></font>
<li>網頁伺服器軟體名稱：<font color=red><%=Request.ServerVariables("SERVER_SOFTWARE")%></font>
<li>伺服器加密：<font color=red><%=Request.ServerVariables("SERVER_PORT_SECURE")%></font>
</ul>

<hr>
<!--#include file="foot.inc"-->
