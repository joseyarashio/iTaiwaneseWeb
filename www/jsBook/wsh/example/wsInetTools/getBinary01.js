// 抓取 binary 檔案，例如 MIDI 或 MP3 檔案等。
web = new ActiveXObject( "wsInetTools.HTTP" );		// 取得 COM 物件
// 定義遠端及本機檔案
remoteFile = "http://neural.cs.nthu.edu.tw/jang/books/JavaScript/example/music/tomorrow.mid";	// 遠端檔案
localFile  = "tomorrow.mid";				// 本機檔案
web.GetBinary(remoteFile, localFile);			// 開始下載
WScript.Echo("下載「"+remoteFile+"」成功！");
WScript.Echo("存成近端檔案：「"+localFile+"」！");