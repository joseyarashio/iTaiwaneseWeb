// 使用 WSH 新增資料庫的內容（有 bug!）

//====== Step 1：建立資料庫連結，然後開啟資料庫
database="test.mdb";
Conn = WScript.CreateObject("ADODB.Connection");
Conn.ConnectionString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="+database; 
Conn.Open();

//====== Step 2：開啟 RecordSet
RecordSet = WScript.CreateObject("ADODB.RecordSet"); 
RecordSet.Open("testTable", Conn, 1, 3, 1); 

//====== Step 3：透過 RecordSet 集合新增資料
RecordSet.AddNew();
RecordSet("AccountName").Value = "newData2";
RecordSet("RealName").Value = "newData2";
RecordSet("RealName").Value = "nobody2@cs.nthu.edu.tw";
RecordSet.Update();

//====== Step 4：關閉 RecordSet 及資料庫連結
RecordSet.Close();
Conn.Close();