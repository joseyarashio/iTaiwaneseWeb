<%title="獨立功能的計數網頁：以 URL 為 Application 物件的變數名稱"%>
<!--#include file="../head.inc"-->
<hr>

<%
url=Request.ServerVariables("URL")
Application(url) = Application(url)+1
%>
<h3 align=center>您是第 <font color=red><%=Application(url)%></font> 位貴賓！</h3>

<hr>
<!--#include file="../foot.inc"-->
