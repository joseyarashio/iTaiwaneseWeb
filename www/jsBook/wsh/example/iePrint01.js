// �}�� IE �ð���C�L
// Roger Jang, 20081215, tested under Vista

// Step 1: �}�� IE �ø��J Google �j�M����
URL="http://www.google.com";
objMyIE = WScript.CreateObject("InternetExplorer.Application");
objMyIE.Navigate(URL);
objMyIE.visible = true;
while (objMyIE.Busy)
	WScript.Sleep(100);
// Step 2: �i��C�L�ʧ@
WshShell=new ActiveXObject("WScript.Shell");
WScript.Echo('Will click alt-f in 5 sec...'); WScript.Sleep(5000);
WshShell.SendKeys("%{f}");
WScript.Echo('Will click p in 5 sec...'); WScript.Sleep(5000);
WshShell.SendKeys("p");
WScript.Echo('Will click enter in 5 sec...'); WScript.Sleep(5000);
WshShell.SendKeys("{ENTER}");
WScript.Echo('Will close the browser in 5 sec...'); WScript.Sleep(5000);
WshShell.SendKeys("%{F4}");