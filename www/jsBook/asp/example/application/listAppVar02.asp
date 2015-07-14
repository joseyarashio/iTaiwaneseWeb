<%@language=JScript%>
<% title = "刪除所有 Application 變數後，再印出 Application.Contents 和 Application.StaticObjects 的內容" %>
<!--#include file="../head.inc"-->
<hr>

<% Application.Contents.Removeall()%>
<!--#include file="../listdict.inc"-->
刪除所有 Application 變數後，再進行列表：
<p><% listdict(Application.Contents, "Application.Contents"); %>
<p><% listdict(Application.StaticObjects, "Application.StaticObjects"); %>

<hr>
<!--#include file="../foot.inc"-->
