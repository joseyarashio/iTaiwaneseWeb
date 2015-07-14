<%@language=jscript%>
<%title="使用 Request.ServerVariables 來抓取 IP"%>
<!--#include file="head.inc"-->
<hr>

<li>HTTP request 來源 IP: <font color=red><%=Request.ServerVariables("REMOTE_ADDR")%></font>
<li>HTTP request 伺服器 IP: <font color=red><%=Request.ServerVariables("LOCAL_ADDR")%></font>
<li>HTTP request 代理伺服器: <font color=red><%=Request.ServerVariables("HTTP_VIA")%></font>
<li>HTTP request 原始來源 IP: <font color=red><%=Request.ServerVariables("HTTP_X_FORWARDED_FOR")%></font>

<hr>
<!--#include file="foot.inc"-->
