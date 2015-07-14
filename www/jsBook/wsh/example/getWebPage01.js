// 抓取一個網頁
inet=new ActiveXObject("InetCtls.Inet");		// 取得 Inet Control 物件
inet.Url="http://www.cs.nthu.edu.tw";			// 欲下載之網頁
inet.RequestTimeOut=60;					// 設定嘗試時間
WScript.Echo("Downloading \""+inet.Url+"\"...");
content = inet.OpenURL();				// 下載網頁
WScript.Echo(content);					// 顯示網頁內容