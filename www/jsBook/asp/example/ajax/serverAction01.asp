<%@language=jscript%>
<%//用於隱藏子網頁的程式碼，負責抓取 ServerVariables%>
<%
// 進行伺服器端的運算
serverName=Request.ServerVariables("SERVER_NAME") 
serverUrl = Request.ServerVariables("URL");
serverIp = Request.ServerVariables("LOCAL_ADDR");
%>
<script>
// 呼叫母網頁的函數 showRetrievedInfo()，以便在母網頁顯示相關資訊
window.parent.showRetrievedInfo('<%=serverName%>', '<%=serverUrl%>', '<%=serverIp%>');
</script>
