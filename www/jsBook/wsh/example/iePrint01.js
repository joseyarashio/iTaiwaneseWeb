// 開啟 IE 並執行列印
// Roger Jang, 20081215, tested under Vista

// Step 1: 開啟 IE 並載入 Google 搜尋網頁
URL="http://www.google.com";
objMyIE = WScript.CreateObject("InternetExplorer.Application");
objMyIE.Navigate(URL);
objMyIE.visible = true;
while (objMyIE.Busy)
	WScript.Sleep(100);
// Step 2: 進行列印動作
WshShell=new ActiveXObject("WScript.Shell");
WScript.Echo('Will click alt-f in 5 sec...'); WScript.Sleep(5000);
WshShell.SendKeys("%{f}");
WScript.Echo('Will click p in 5 sec...'); WScript.Sleep(5000);
WshShell.SendKeys("p");
WScript.Echo('Will click enter in 5 sec...'); WScript.Sleep(5000);
WshShell.SendKeys("{ENTER}");
WScript.Echo('Will close the browser in 5 sec...'); WScript.Sleep(5000);
WshShell.SendKeys("%{F4}");