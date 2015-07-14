// 開啟 IE 並執行列印
// Step 1: 開啟 IE 並載入 Google 搜尋網頁
URL="http://www.google.com";
objMyIE = WScript.CreateObject("InternetExplorer.Application");
objMyIE.Navigate(URL);
objMyIE.visible = true;
while (objMyIE.Busy)
	WScript.Sleep(100);
// Step 2: 進行列印動作
WshShell=new ActiveXObject("WScript.Shell");
WshShell.SendKeys("^{p}");
WScript.Sleep(1000);
WshShell.SendKeys("{ENTER}");
WScript.Sleep(1000);
WshShell.SendKeys("%{F4}");