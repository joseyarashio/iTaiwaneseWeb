<%@language=JScript%>
<% title = "�R���Ҧ� Application �ܼƫ�A�A�L�X Application.Contents �M Application.StaticObjects �����e" %>
<!--#include file="../head.inc"-->
<hr>

<% Application.Contents.Removeall()%>
<!--#include file="../listdict.inc"-->
�R���Ҧ� Application �ܼƫ�A�A�i��C��G
<p><% listdict(Application.Contents, "Application.Contents"); %>
<p><% listdict(Application.StaticObjects, "Application.StaticObjects"); %>

<hr>
<!--#include file="../foot.inc"-->
