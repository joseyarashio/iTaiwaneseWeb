// 使用 wsInetTools.dll 抓取 HTML 檔案。
web  = new ActiveXObject("wsInetTools.HTTP");	// 取得 COM 物件
url = "http://www.cs.nthu.edu.tw";		// 欲下載之網頁
contents = web.GetWebPage(url);			// 開始下載網頁
WScript.Echo("下載「"+url+"」成功！檔案內容如下：");
WScript.Echo(contents);				// 顯示網頁內容