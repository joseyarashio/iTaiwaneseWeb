// 設定 IE 的預設網頁
// Roger Jang, 20081215, tested under Vista

WshShell=new ActiveXObject("WScript.Shell");
WshShell.Run("iexplore", 9);
WScript.Sleep(5000);		// 等待網頁載入
WshShell.SendKeys("%t");
WshShell.SendKeys("o");
WScript.Sleep(500);
WshShell.SendKeys("http://www.google.com");
WScript.Sleep(500);
for (i=0; i<12; i++)	// 若是 IE6，請將12改為13
	WshShell.SendKeys("{TAB}");
WshShell.SendKeys("{ENTER}");
WScript.Sleep(500);