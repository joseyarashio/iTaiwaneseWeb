// �ϥ� WSH �s�W��Ʈw�����e�]�� bug!�^

//====== Step 1�G�إ߸�Ʈw�s���A�M��}�Ҹ�Ʈw
database="test.mdb";
Conn = WScript.CreateObject("ADODB.Connection");
Conn.ConnectionString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="+database; 
Conn.Open();

//====== Step 2�G�}�� RecordSet
RecordSet = WScript.CreateObject("ADODB.RecordSet"); 
RecordSet.Open("testTable", Conn, 1, 3, 1); 

//====== Step 3�G�z�L RecordSet ���X�s�W���
RecordSet.AddNew();
RecordSet("AccountName").Value = "newData2";
RecordSet("RealName").Value = "newData2";
RecordSet("RealName").Value = "nobody2@cs.nthu.edu.tw";
RecordSet.Update();

//====== Step 4�G���� RecordSet �θ�Ʈw�s��
RecordSet.Close();
Conn.Close();