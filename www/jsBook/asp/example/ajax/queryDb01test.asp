<%@language=jscript%>
<%//AJAX remot program in charge of database query%>
<html>
<head>
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
</head>
<body>
<%
// 傳回查詢資料庫的第一筆資料
function getFirstRecordFromQueryResult(database, sql){
	var Conn = Server.CreateObject("ADODB.Connection");
	Conn.ConnectionString = "DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
	Conn.Open();
	var RS = Conn.Execute(sql);
	var out="<p><b>Query Result of <u>"+sql+"</u>:</b><p>";
	if (RS.EOF)
		return(out+"No data found!");
	for (i=0; i<RS.Fields.Count; i++)
		out=out+"<font color=red>"+RS(i).Name+"</font>: <font color=blue>"+RS(i)+"</font><br>";
	RS.Close();
	Conn.Close();
	return(out);
}

database="test.mdb";		// 資料庫名稱
sql="SELECT * from Singer where ChineseName = '"+Request("singerName")+"'";	// 造出 SQL 指令
outStr=getFirstRecordFromQueryResult(database, sql);				// 回傳第一筆查詢結果
Response.write(outStr);		// 印出查詢結果
%>
</body>
</html>
