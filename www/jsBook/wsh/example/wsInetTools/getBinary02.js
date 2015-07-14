// 抓取 binary 檔案，例如 MIDI 檔等。

web = new ActiveXObject( "wsInetTools.HTTP" );		// Instantiate COM Object
// Define local and remote files
remoteFile = "http://neural.cs.nthu.edu.tw/jang/books/html/example/multimedia/乾一杯.wma";
localFile  = "乾一杯.wma";
web.GetBinary(remoteFile, localFile);			// Download and save
WScript.Echo("下載「"+remoteFile+"」成功！");
WScript.Echo("存成近端檔案：「"+localFile+"」！");