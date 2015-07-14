// 抓取一個網頁，並將其內容存入一個檔案
inet=new ActiveXObject("InetCtls.Inet");		// 取得 Inet Control 物件
inet.Url="http://www.cs.nthu.edu.tw";			// 欲下載之網頁
inet.RequestTimeOut=20;					// 設定嘗試時間
WScript.Echo("Downloading \""+inet.Url+"\"...");
content = inet.OpenURL();				// 下載網頁
// 以下將網頁內容寫入本機檔案
fso = new ActiveXObject("Scripting.FileSystemObject");
forReading=1, forWriting=2;
fileName="test.htm";
fid=fso.OpenTextFile(fileName, forWriting, true);
fid.Write(content);
fid.Close();
WScript.Echo("從「"+inet.Url+"」抓到的內容已被存入「"+fileName+"」！");