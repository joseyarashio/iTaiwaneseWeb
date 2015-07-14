<%
rem 本頁之任務為消除認證資訊（即將變數 session("secret")設定為 False），並載入來源網頁
session("secret") = FALSE
response.redirect(session("source"))
%>
