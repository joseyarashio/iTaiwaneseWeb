// ��� binary �ɮסA�Ҧp MIDI �� MP3 �ɮ׵��C
web = new ActiveXObject( "wsInetTools.HTTP" );		// ���o COM ����
// �w�q���ݤΥ����ɮ�
remoteFile = "http://neural.cs.nthu.edu.tw/jang/books/JavaScript/example/music/tomorrow.mid";	// �����ɮ�
localFile  = "tomorrow.mid";				// �����ɮ�
web.GetBinary(remoteFile, localFile);			// �}�l�U��
WScript.Echo("�U���u"+remoteFile+"�v���\�I");
WScript.Echo("�s������ɮסG�u"+localFile+"�v�I");