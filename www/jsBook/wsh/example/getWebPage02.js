// 抓取一個網頁，並抓出其標題
inet=new ActiveXObject("InetCtls.Inet");		// 取得 Inet Control 物件
inet.Url="http://www.cs.nthu.edu.tw";			// 欲下載之網頁
inet.RequestTimeOut=60;					// 設定嘗試時間
WScript.Echo("Downloading \""+inet.Url+"\"...");
content = inet.OpenURL();				// 下載網頁
pattern = /<title>(.*)<\/title>/i;			// 定義通用表示式
title = pattern.exec(content);				// 抓出標題
WScript.Echo("位於「"+inet.Url+"」的網頁的標題是「"+RegExp.$1+"」！");	// 顯示結果