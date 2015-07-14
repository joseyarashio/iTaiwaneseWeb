<%@language=jscript%>
<%//用於隱藏子網頁的程式碼，負責查詢資料庫%>
<script language=jscript runat=server src=sqlUtility.fun></script>
<%
database="basketball.mdb";
sql=Request("sql")+"";
if (sql.search(/select/i)<0)	// 檢查是否以 select 開頭
	outStr="<font color=red>SQL command not started with SELECT is disabled!</font>";
else 
	outStr=getQueryResult(database, sql);
%>
<script>
// 呼叫母網頁的函數 showQueryResult()，以便在母網頁顯示相關資訊
window.parent.showQueryResult('<%=outStr%>');
</script>
