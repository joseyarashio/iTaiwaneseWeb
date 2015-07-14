<%@language=JScript%>
<%Response.Buffer=false%>
<%title="Response.Buffer、Flush、Clear、End 的範例"%>
<!--#include file="../head.inc"-->
<hr>

我把緩衝區的內容立刻送到客戶端，所以這是你看得到的內容。
<%Response.Flush;%>

<p>我把緩衝區的內容清掉了，所以這是你看不到的內容。
<%Response.Clear;%>

<p>我又開始寫入緩衝區，所以這是你看得到的內容。

<%Response.End;%>
<p>這些都看不到，因為伺服器看到 Response.End，就不再傳送資料了！
