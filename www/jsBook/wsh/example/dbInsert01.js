// 使用 WSH 新增資料庫的內容

//====== Step 1：建立資料庫連結，然後開啟資料庫
database="test.mdb";
Conn = WScript.CreateObject("ADODB.Connection");
Conn.ConnectionString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="+database; 
Conn.Open();

//====== Step 2：建立 SQL 命令並執行之
SQL="INSERT INTO testTable ([account], [name]) VALUES ('new1', 'new2')";
Conn.Execute(SQL);

//====== Step 3：關閉 RecordSet 及資料庫連結
Conn.Close();