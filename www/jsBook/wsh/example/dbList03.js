// 將 testTable 資料表的內容儲存到 output.txt
WScript.Echo("將 testTable 資料表的內容儲存到 output.txt ...");
sql2file("test.mdb", "select * from testTable", "output.txt");

// ====== Function definitions
function sql2file(database, sql, file){
	conn = WScript.CreateObject("ADODB.Connection"); 
	conn.ConnectionString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="+database;
	conn.Open();
	rs = WScript.CreateObject("ADODB.RecordSet"); 
	rs.Open(sql, conn, 3, 3);

	fso = WScript.CreateObject("Scripting.FileSystemObject")
	fid = fso.CreateTextFile(file, true);

	// 印出欄位名稱
	for (i=0; i<rs.Fields.Count; i++)
		fid.Write(rs(i).Name+"\t");
	fid.Write("\r\n");
	// 印出每筆資料
	while (!rs.EOF){
		for (j=0; j<rs.Fields.Count; j++)
			fid.Write(rs(j)+"\t");
		fid.Write("\r\n");
		rs.MoveNext();
	}
	fid.Close();
	rs.Close();
	conn.Close();
}