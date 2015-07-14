<%@language=jscript%>
<%title="使用 Request.ServerVariables 來列出與網頁路徑相關的資訊"%>
<!--#include file="head.inc"-->
<hr>

<ul>
<li>伺服器根目錄的實體硬碟路徑：<font color=red><%=Request.ServerVariables("APPL_PHYSICAL_PATH")%></font>
<li>網頁在實體硬碟的路徑：<font color=red><%=Request.ServerVariables("PATH_TRANSLATED")%></font>
<li>網頁相對應於伺服器根目錄的路徑：<font color=red><%=Request.ServerVariables("PATH_INFO")%></font>
<li>網頁相對應於伺服器根目錄的路徑：<font color=red><%=Request.ServerVariables("SCRIPT_NAME")%></font>
<li>網頁相對應於伺服器根目錄的路徑：<font color=red><%=Request.ServerVariables("URL")%></font>
</ul>

<hr>
<!--#include file="foot.inc"-->
