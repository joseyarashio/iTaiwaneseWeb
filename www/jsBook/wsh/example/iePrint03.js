// �}�� IE �ð���C�L
// Step 1: �}�� IE �ø��J Google �j�M����
URL="http://www.google.com";
objMyIE = WScript.CreateObject("InternetExplorer.Application");
objMyIE.Navigate(URL);
objMyIE.visible = true;
while (objMyIE.Busy)
	WScript.Sleep(100);
// Step 2: �i��C�L�ʧ@
WshShell=new ActiveXObject("WScript.Shell");
WshShell.SendKeys("^{p}");
WScript.Sleep(1000);
WshShell.SendKeys("{ENTER}");
WScript.Sleep(1000);
WshShell.SendKeys("%{F4}");