// 使用 WSH 列出資料庫的內容

//====== Step 1：建立資料庫連結，然後開啟資料庫
database="test.mdb";
conn = WScript.CreateObject("ADODB.Connection");
conn.ConnectionString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="+database; 
conn.Open();

//====== Step 2：執行SQL指令，並將查詢結果儲存於 recordset 中
recordSet = WScript.CreateObject("ADODB.RecordSet"); 
sql = "SELECT * FROM testTable"; //從資料表 test 取出所有資料
recordSet.Open(sql, conn, 3, 3); 

//====== Step 3：透過 recordSet 集合取得欄位的內容
//印出欄位名稱
WScript.Echo("欄位名稱：");
for (i=0; i<recordSet.Fields.Count; i++)
	WScript.StdOut.Write(recordSet(i).Name+"\t");
WScript.Echo("");

//印出每一筆資料
i=1;
WScript.Echo("每一筆資料：");
while (!recordSet.EOF){
	for (j=0; j<recordSet.Fields.Count; j++)
		WScript.StdOut.Write(recordSet(j)+"\t");
	WScript.StdOut.Write("\n");
	i++;
	recordSet.MoveNext();
}

//====== Step 4：關閉 recordSet 及資料庫連結
recordSet.Close();
conn.Close();