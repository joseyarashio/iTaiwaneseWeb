// �ϥ� WSH �C�X��Ʈw�����e

//====== Step 1�G�إ߸�Ʈw�s���A�M��}�Ҹ�Ʈw
database="test.mdb";
conn = WScript.CreateObject("ADODB.Connection");
conn.ConnectionString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="+database; 
conn.Open();

//====== Step 2�G����SQL���O�A�ñN�d�ߵ��G�x�s�� recordset ��
recordSet = WScript.CreateObject("ADODB.RecordSet"); 
sql = "SELECT * FROM testTable"; //�q��ƪ� test ���X�Ҧ����
recordSet.Open(sql, conn, 3, 3); 

//====== Step 3�G�z�L recordSet ���X���o��쪺���e
//�L�X���W��
WScript.Echo("���W�١G");
for (i=0; i<recordSet.Fields.Count; i++)
	WScript.StdOut.Write(recordSet(i).Name+"\t");
WScript.Echo("");

//�L�X�C�@�����
i=1;
WScript.Echo("�C�@����ơG");
while (!recordSet.EOF){
	for (j=0; j<recordSet.Fields.Count; j++)
		WScript.StdOut.Write(recordSet(j)+"\t");
	WScript.StdOut.Write("\n");
	i++;
	recordSet.MoveNext();
}

//====== Step 4�G���� recordSet �θ�Ʈw�s��
recordSet.Close();
conn.Close();