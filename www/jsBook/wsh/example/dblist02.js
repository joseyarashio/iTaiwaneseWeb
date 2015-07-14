// 大小寫有別的資料庫查詢
sql="select * from testTable where account='abc'";
WScript.Echo("大小寫不分的比對：sql = "+sql);
WScript.Echo("比對結果：");
sql2screen("test.mdb", sql); 
sql="select * from testTable where strcomp(account, 'abc',0)=0";
WScript.Echo("大小寫有別的比對：sql = "+sql);
WScript.Echo("比對結果：");
sql2screen("test.mdb", sql); 

// ====== Function definitions
function sql2screen(database, sql){
	conn = WScript.CreateObject("ADODB.Connection"); 
	conn.ConnectionString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="+database;
	conn.Open();
	rs = WScript.CreateObject("ADODB.RecordSet"); 
	rs.Open(sql, conn, 3, 3);

	// 印出欄位名稱
	for (i=0; i<rs.Fields.Count; i++)
		WScript.StdOut.Write(rs(i).Name+"\t");
	WScript.StdOut.Write("\n");
	// 印出每筆資料
	while (!rs.EOF){
		for (j=0; j<rs.Fields.Count; j++)
			WScript.StdOut.Write(rs(j)+"\t");
		WScript.StdOut.Write("\n");
		rs.MoveNext();
	}
	rs.Close();
	conn.Close();
}