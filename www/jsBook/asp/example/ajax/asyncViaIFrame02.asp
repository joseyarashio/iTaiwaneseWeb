<%@language=jscript%>
<%title="使用 iframe 來進行非同步傳輸的進階範例：資料庫查詢"%>
<html>
<head>
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
</head>

<body>
<h2 align=center><%=title%></h2>
<hr>

<script>
// 顯示從伺服器回傳的資訊，此函數只會被隱藏的子網頁所呼叫。
function showQueryResult(result){
	document.getElementById('showSqlResult').innerHTML=result;	// 顯示查詢結果
//	document.getElementById('hiddenIFrame').src='';			// 清除 iframe 的網址
}

// 母網頁表單的回應函數，只被母網頁呼叫。
function sendQuery(){
	var sqlCommand = document.getElementById('sqlCommand');
	var sql=sqlCommand.value;
	var iframe = document.getElementById('hiddenIFrame');	// 取得 iframe 物件
	iframe.src = "serverAction02.asp?sql="+escape(sql);	// 設定 iframe 的網址，其中 sql 必須先經過 escape() 函數的編碼
}
</script>

<script language=jscript runat=server src=sqlUtility.fun></script>
<% database = "basketball.mdb"; %>
資料庫完整內容：
<center>
<table border=1>
<tr>
<th colspan=2 align=center>
資料庫 "<%=database%>"
<tr>
<td align=center> 資料表 "Player" 的內容
<td align=center> 資料表 "Team" 的內容
<tr>
<td> <%=getQueryResult(database, "select * from Player")%>
<td> <%=getQueryResult(database, "select * from Team")%>
</table>
</center>
<p>
請輸入你的SQL指令：<br>
<input id=sqlCommand size=80 type=text value="SELECT * FROM Player WHERE Name LIKE '陳%'"><br>
<input type="button" value="進行查詢" onClick="sendQuery()">
<p>
查詢結果：<div id="showSqlResult"></div>

<iframe id="hiddenIFrame" style="display:none"></iframe>

</body>
</html>
