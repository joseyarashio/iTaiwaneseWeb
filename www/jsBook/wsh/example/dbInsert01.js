// �ϥ� WSH �s�W��Ʈw�����e

//====== Step 1�G�إ߸�Ʈw�s���A�M��}�Ҹ�Ʈw
database="test.mdb";
Conn = WScript.CreateObject("ADODB.Connection");
Conn.ConnectionString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="+database; 
Conn.Open();

//====== Step 2�G�إ� SQL �R�O�ð��椧
SQL="INSERT INTO testTable ([account], [name]) VALUES ('new1', 'new2')";
Conn.Execute(SQL);

//====== Step 3�G���� RecordSet �θ�Ʈw�s��
Conn.Close();