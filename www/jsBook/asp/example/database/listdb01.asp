<%@ language="jscript" %>
<% title="以 JScript 進行資料庫列表：使用資料庫路徑" %>
<!--#include file="../head.inc"-->
<hr>

<%
//====== Step 1：建立資料庫連結，然後開啟資料庫
conn = Server.CreateObject("ADODB.Connection");
conn.ConnectionString = "DBQ=" + Server.MapPath("test.mdb") + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
conn.Open();

//====== Step 2：執行SQL指令，並將查詢結果儲存於 Recordset 中
sql = "SELECT * FROM testTable";	//從資料表 testTable 取出所有資料
rs = conn.Execute(sql);
%>

<table border=1 align=center>
<tr bgcolor="cyan">
<%
//====== Step 3：透過 RecordSet 集合取得欄位的內容
//印出欄位名稱
for (i=0; i<rs.Fields.Count; i++)
	Response.write("<th>"+rs(i).Name+"</th>\n");
%>
</tr>
<%
//印出每一筆資料
while (!rs.EOF) {
	Response.write("<tr>\n");
	for (i=0; i<rs.Fields.Count; i++)
		Response.write("<td>"+rs(i)+"&nbsp;</td>\n");
	rs.MoveNext();
}
%>
</table>

<%
//====== Step 4：關閉 RecordSet 及資料庫連結
rs.Close();
conn.Close();
%>

<hr>
<!--#include file="../foot.inc"-->
