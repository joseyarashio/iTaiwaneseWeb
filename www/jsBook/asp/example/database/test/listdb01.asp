<%@ language="jscript" %>
<% title="以 JScript 進行資料庫列表：使用資料庫路徑" %>
<html>
<head>
	<title><%=title%></title>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
	<style>
		td {font-family: "標楷體", "helvetica,arial", "Tahoma"}
		A:link {text-decoration: none}
		A:hover {text-decoration: underline}
	</style>
</head>
<body>
<h2 align=center><%=title%></h2>
<hr>

<%
//====== Step 1：建立資料庫連結，然後開啟資料庫
Conn = Server.CreateObject("ADODB.Connection");
Conn.ConnectionString = "DBQ=" + Server.MapPath("test.mdb") + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
Conn.Open();

//====== Step 2：執行SQL指令，並將查詢結果儲存於 Recordset 中
SQL = "Select * from testTable";	//從資料表 testTable 取出所有資料
RS = Conn.Execute(SQL);
%>

<table border=1 align=center>
<tr bgcolor="cyan">
<%
//====== Step 3：透過 RecordSet 集合取得欄位的內容
//印出欄位名稱
for (i=0; i<RS.Fields.Count; i++)
	Response.write("<th>"+RS(i).Name+"</th>\n");
%>
</tr>
<%
//印出每一筆資料
while (!RS.EOF) {
	Response.write("<tr>\n");
	for (i=0; i<RS.Fields.Count; i++)
		Response.write("<td>"+RS(i)+"&nbsp;</td>\n");
	RS.MoveNext();
}
%>
</table>

<%
//====== Step 4：關閉 RecordSet 及資料庫連結
RS.Close();
Conn.Close();
%>

<hr>
<script>function viewSource() {window.location="view-source:"+window.location} </script>
檢視原始碼：
[<a target=_blank href="/jang/books/asp/common/showcode.asp?source=<%=Request.ServerVariables("PATH_INFO")%>">Server-side script</a>]
[Client-side script（請按 alt-v & c）]
<br>回到「<a href="/jang/books/asp">JScript 程式設計與應用：伺服器端</a>」</b>
</html>
