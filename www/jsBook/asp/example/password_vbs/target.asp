<!--#include file="auth.inc"-->
<%title = "秘密網頁" %>
<!--#include file="../head.inc"-->
<hr>

<p align=center>您已成功登入秘密網頁！</h3>
<p align=center>本網頁為 "target.asp"，相關 session 變數如下：
<br>session("source") = <%=session("source")%>
<br>session("target") = <%=session("target")%>

<p align=center>
<a href="delauth.asp">消除認證資訊</a><br>
（檢視相關原始碼：<a href="/jang/books/asp/common/showcode.asp?source=/jang/books/webprog/06asp/example/password/auth.inc">auth.inc</a>, <a href="/jang/books/webprog/common/showcode.asp?source=/jang/books/webprog/06asp/example/password/delauth.asp">delauth.asp</a>）

<hr>
<!--#include file="../foot.inc"-->
