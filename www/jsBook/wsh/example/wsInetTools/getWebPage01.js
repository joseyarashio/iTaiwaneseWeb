// �ϥ� wsInetTools.dll ��� HTML �ɮסC
web  = new ActiveXObject("wsInetTools.HTTP");	// ���o COM ����
url = "http://www.cs.nthu.edu.tw";		// ���U��������
contents = web.GetWebPage(url);			// �}�l�U������
WScript.Echo("�U���u"+url+"�v���\�I�ɮפ��e�p�U�G");
WScript.Echo(contents);				// ��ܺ������e