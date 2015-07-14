<%@language=JScript%>
<% title="以檔案為主的記數器" %>
<!--#include file="../head.inc"-->
<hr>

<center>
<!--#include file="counter.inc"-->
您是本頁的第 <font color=green><%=pageHitCounter()%></font> 位訪客.！
<%counterFile=Request.ServerVariables("URL") + ".cnt";%>
<p>（本頁的記數資料儲存在 <a href="<%=counterFile%>"><%=counterFile%></a>。）
<p>（按「<a href="javascript:history.go(0)">重新整理</a>」以增加記數資料。）
</center>

<hr>
<!--#include file="../foot.inc"-->
