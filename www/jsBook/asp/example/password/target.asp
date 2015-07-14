<%@language=jscript%>
<!--#include file="auth.inc"-->
<%title = "秘密網頁" %>
<!--#include file="../head.inc"-->
<hr>

<p align=center>您已成功登入秘密網頁！</h3>
<p align=center>本網頁為 "target.asp"，相關 session 變數如下：
<br>Session("source") = <%=Session("source")%>
<br>Session("target") = <%=Session("target")%>

<p align=center>
<a href="delauth.asp">消除認證資訊</a><br>

<hr>
<!--#include file="../foot.inc"-->
