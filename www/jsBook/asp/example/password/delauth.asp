<%@language=jscript%>
<%
// 本頁之任務為消除認證資訊（即將變數 session("ok")設定為 False），並載入 source.asp 網頁
Session("ok") = false;
Response.Redirect(Session("source"));
%>
