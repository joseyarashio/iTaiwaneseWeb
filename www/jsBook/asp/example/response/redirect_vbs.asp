<%
if Request.Form("select")<>"" then
       Response.Redirect(Request.Form("select"))
end if
%>

<%title="Response.Redirect 的範例"%>
<!--#include file="../head.inc"-->
<hr>

請選一個轉址目標：
<form method="post">
<input type="radio" name="select" value="/jang/books/html" onClick="this.form.submit()">
HTML 線上中文手冊<br>
<input type="radio" name="select" value="/jang/books/javaScript" onClick="this.form.submit()">
JavaScript 線上中文手冊<br>
<input type="radio" name="select" value="/jang/books/asp" onClick="this.form.submit()">
ASP 線上中文手冊<br>
</form>

<hr>
<!--#include file="../foot.inc"-->
