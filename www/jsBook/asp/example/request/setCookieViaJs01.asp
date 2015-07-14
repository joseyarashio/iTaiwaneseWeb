<%@Language=JScript%>
<% title = "以 JScript 印出 Request.Cookies 的內容" %>
<!--#include file="../head.inc"-->
<hr>

<script src="cookieUtility.js"></script>
<script>
today = new Date();
todayString = today.toLocaleString();
// 後在用戶端做的事：設定小餅乾
setCookie("lastLoadTime", todayString);
document.write("This page's loading time = " + todayString);
</script>
（此小餅乾已經被寫入，但無法立刻由 server script 來顯示，必須由 client script 來顯示。）

<h3>由 Server Script 所顯示的小餅乾：</h3>
<!--#include file="../listdict.inc"-->
<!--先在伺服器做的事：列出本頁的小餅乾-->
<% listdict(Request.Cookies, "Request.Cookies"); %>

<h3>由 Client Script 所顯示的小餅乾：</h3>
<script>listCookie();</script>

<hr>
<!--#include file="../foot.inc"-->
