// �ϥ� SendKeys �h�}�ҰO�ƥ��üg�J��r�B�s��

WshShell=new ActiveXObject("WScript.Shell");

WshShell.Run("iexplore", 9);
WScript.Sleep(1000);	// Give IE some time to load
WshShell.SendKeys("{TAB}");
WshShell.SendKeys("www.google.com");
WshShell.SendKeys("{ENTER}");
WScript.Sleep(5000);	// Give IE some time to load
WshShell.SendKeys("�i���P");
WshShell.SendKeys("{ENTER}");

WScript.Quit();

WScript.Sleep(500);	// Give Notepad some time to load
for (i=0; i<10; i++){
	WshShell.SendKeys(i+". Hello World!");
	WshShell.SendKeys("{ENTER}");
}
WshShell.SendKeys("%{F}");
WshShell.SendKeys("s");
WshShell.SendKeys("test.txt");
WshShell.SendKeys("{TAB}{TAB}{ENTER}");
WshShell.SendKeys("y");
WshShell.SendKeys("%{F4}");