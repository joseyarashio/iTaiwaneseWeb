// ����@�Ӻ����A�ñN�䤺�e�s�J�@���ɮ�
inet=new ActiveXObject("InetCtls.Inet");		// ���o Inet Control ����
inet.Url="http://www.cs.nthu.edu.tw";			// ���U��������
inet.RequestTimeOut=20;					// �]�w���ծɶ�
WScript.Echo("Downloading \""+inet.Url+"\"...");
content = inet.OpenURL();				// �U������
// �H�U�N�������e�g�J�����ɮ�
fso = new ActiveXObject("Scripting.FileSystemObject");
forReading=1, forWriting=2;
fileName="test.htm";
fid=fso.OpenTextFile(fileName, forWriting, true);
fid.Write(content);
fid.Close();
WScript.Echo("�q�u"+inet.Url+"�v��쪺���e�w�Q�s�J�u"+fileName+"�v�I");