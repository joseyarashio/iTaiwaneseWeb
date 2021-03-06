<% title="以 VBScript 進行資料庫列表" %>
<!--#include file="../head.inc"-->
<hr>
<%
'====== Step 1：建立資料庫連結，然後開啟資料庫
set Conn = Server.CreateObject("ADODB.Connection")
Conn.Open "DBQ=" & Server.MapPath("test.mdb") & ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;"

'====== Step 2：執行SQL指令，並將查詢結果儲存於 Recordset 中
SQL = "Select * from test"	'從資料表 test 取出所有資料
Set RS = Conn.Execute(SQL)
%>

<table border=1 align=center>
<tr bgcolor="cyan">
<%
'====== Step 3：透過 RecordSet 集合取得欄位的內容
'印出表頭內容
For i=0 to RS.Fields.Count-1
	Response.Write("<th>" & RS(i).Name & "</th>")
next %>
</tr>
<%
'印出每一筆資料
Do While NOT RS.EOF
	Response.Write("<tr>")
	For i=0 to RS.Fields.Count-1
		Response.Write("<td>" & RS(i) & "&nbsp;</td>")
	next
	Response.Write("</tr>")
	RS.MoveNext
Loop
%>
</table>

<%
'====== Step 4：關閉 RecordSet 及資料庫連結
RS.Close
Conn.Close
%>

<p align=center>
相關網頁：<a href="listdb.asp">以 JScript 進行資料庫列表</a>

<hr>
<!--#include file="../foot.inc"-->
