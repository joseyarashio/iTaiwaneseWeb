// ����@�Ӻ����A�ç�X����D
inet=new ActiveXObject("InetCtls.Inet");		// ���o Inet Control ����
inet.Url="http://www.cs.nthu.edu.tw";			// ���U��������
inet.RequestTimeOut=60;					// �]�w���ծɶ�
WScript.Echo("Downloading \""+inet.Url+"\"...");
content = inet.OpenURL();				// �U������
pattern = /<title>(.*)<\/title>/i;			// �w�q�q�Ϊ�ܦ�
title = pattern.exec(content);				// ��X���D
WScript.Echo("���u"+inet.Url+"�v�����������D�O�u"+RegExp.$1+"�v�I");	// ��ܵ��G