// ����@�Ӻ���
inet=new ActiveXObject("InetCtls.Inet");		// ���o Inet Control ����
inet.Url="http://www.cs.nthu.edu.tw";			// ���U��������
inet.RequestTimeOut=60;					// �]�w���ծɶ�
WScript.Echo("Downloading \""+inet.Url+"\"...");
content = inet.OpenURL();				// �U������
WScript.Echo(content);					// ��ܺ������e