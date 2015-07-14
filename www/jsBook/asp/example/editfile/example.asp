<!--#include file="editfile.inc"-->
<%title="線上檔案修改的範例"%>
<!--#include file="../head.inc"-->
<hr>
<!-- ==========為保存檔案完整，請勿修改此列以上之資料========== -->

此頁資料可供修改，請按下 F9，經由認證後，即可進行修改。亦可按此<a href="editfile.asp?FileName=<%=Request.ServerVariables("PATH_INFO")%>">連結</a>以進行檔案編修。
<p>
欲測試此網頁之修改，請填入您的大名：
<ol>
<li>林政源
<li>陳江村
<li>葉佳慧
</ol>
（請勿任意修改，以保護其他同學學習此範例之權益，謝謝！）

<!-- ==========為保存檔案完整，請勿修改此列以下之資料========== -->
<hr>
<!!--#include file="../foot.inc"-->
