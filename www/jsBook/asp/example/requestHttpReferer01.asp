<%@language=jscript%>
<%title="使用 Request.ServerVariables 來抓取「連結至目前網頁的前一個網頁」"%>
<!--#include file="head.inc"-->
<hr>

<ul>
<li>連結至目前網頁的前一個網頁：<font color=red><%=Request.ServerVariables("HTTP_REFERER")%></font>
<li>用戶端所用的瀏覽器：<font color=red><%=Request.ServerVariables("HTTP_USER_AGENT")%></font>
<li>用戶端登錄至網頁的帳號：<font color=red><%=Request.ServerVariables("LOGON_USER")%></font>
</ul>

<hr>
<!--#include file="foot.inc"-->
