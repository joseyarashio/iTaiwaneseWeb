
<%
'====== Step 1：建立資料庫連結，然後開啟資料庫
set Conn = Server.CreateObject("ADODB.Connection")
Conn.Open "Driver={Microsoft Access Driver (*.mdb)};DBQ=" & Server.MapPath("owen.mdb") & ";UID=;PWD="

'====== Step 2：執行SQL指令，並將查詢結果儲存於 Recordset 中
SQL = "Select * from singer" '從資料表 singer 取出所有資料
Set RS = Conn.Execute(SQL)
%>

<h2 align=center>資料庫列表</h2>
<hr>

<table border=2 align=center>
<tr bgcolor="cyan">
<%
'====== Step 3：透過 RecordSet 集合取得欄位的內容
'印出表頭內容
For i=0 to RS.Fields.Count-1 %>
      <th><%=RS(i).Name%></th>
<%  next %>
</tr>

<%
'印出每一筆資料
Do While NOT RS.EOF %>
      <tr>
      <%  For i=0 to RS.Fields.Count-1%>
           <td><%=RS(i)%> </td>
      <%  next %>
      </tr>
<%  RS.MoveNext
Loop
%>
</table>

<%
'====== Step 4：關閉 RecordSet 及資料庫連結
RS.Close
Conn.Close
%>

<hr>
<!--#include file="foot.inc"-->
