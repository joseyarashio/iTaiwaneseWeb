// �j�p�g���O����Ʈw�d��
sql="select * from testTable where account='abc'";
WScript.Echo("�j�p�g���������Gsql = "+sql);
WScript.Echo("��ﵲ�G�G");
sql2screen("test.mdb", sql); 
sql="select * from testTable where strcomp(account, 'abc',0)=0";
WScript.Echo("�j�p�g���O�����Gsql = "+sql);
WScript.Echo("��ﵲ�G�G");
sql2screen("test.mdb", sql); 

// ====== Function definitions
function sql2screen(database, sql){
	conn = WScript.CreateObject("ADODB.Connection"); 
	conn.ConnectionString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="+database;
	conn.Open();
	rs = WScript.CreateObject("ADODB.RecordSet"); 
	rs.Open(sql, conn, 3, 3);

	// �L�X���W��
	for (i=0; i<rs.Fields.Count; i++)
		WScript.StdOut.Write(rs(i).Name+"\t");
	WScript.StdOut.Write("\n");
	// �L�X�C�����
	while (!rs.EOF){
		for (j=0; j<rs.Fields.Count; j++)
			WScript.StdOut.Write(rs(j)+"\t");
		WScript.StdOut.Write("\n");
		rs.MoveNext();
	}
	rs.Close();
	conn.Close();
}