�?<%@language=jscript%>
<%
// ?��??�詢資�?庫�?第�?筆�???
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

// 延遲一下�?以便讓主網�??��?顯示?��??��??�中...??
total=0;
for (i=0; i<1000000; i++)
	total=total+i;

database="test.mdb";		// 資�?庫�?�?
sql="SELECT * from Singer where ChineseName = '"+Request("singerName")+"'";	// ?�出 SQL ?�令
outStr=getFirstRecordFromQueryResult(database, sql);				// ?�傳第�?筆查詢�???
Response.write(outStr);		// ?�出?�詢結�?
%>
