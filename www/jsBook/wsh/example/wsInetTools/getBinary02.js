// ��� binary �ɮסA�Ҧp MIDI �ɵ��C

web = new ActiveXObject( "wsInetTools.HTTP" );		// Instantiate COM Object
// Define local and remote files
remoteFile = "http://neural.cs.nthu.edu.tw/jang/books/html/example/multimedia/���@�M.wma";
localFile  = "���@�M.wma";
web.GetBinary(remoteFile, localFile);			// Download and save
WScript.Echo("�U���u"+remoteFile+"�v���\�I");
WScript.Echo("�s������ɮסG�u"+localFile+"�v�I");