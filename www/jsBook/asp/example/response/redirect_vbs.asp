<%
if Request.Form("select")<>"" then
       Response.Redirect(Request.Form("select"))
end if
%>

<%title="Response.Redirect ���d��"%>
<!--#include file="../head.inc"-->
<hr>

�п�@����}�ؼСG
<form method="post">
<input type="radio" name="select" value="/jang/books/html" onClick="this.form.submit()">
HTML �u�W�����U<br>
<input type="radio" name="select" value="/jang/books/javaScript" onClick="this.form.submit()">
JavaScript �u�W�����U<br>
<input type="radio" name="select" value="/jang/books/asp" onClick="this.form.submit()">
ASP �u�W�����U<br>
</form>

<hr>
<!--#include file="../foot.inc"-->
