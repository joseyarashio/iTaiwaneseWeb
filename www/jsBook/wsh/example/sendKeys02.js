// �]�w IE ���w�]����
// Roger Jang, 20081215, tested under Vista

WshShell=new ActiveXObject("WScript.Shell");
WshShell.Run("iexplore", 9);
WScript.Sleep(5000);		// ���ݺ������J
WshShell.SendKeys("%t");
WshShell.SendKeys("o");
WScript.Sleep(500);
WshShell.SendKeys("http://www.google.com");
WScript.Sleep(500);
for (i=0; i<12; i++)	// �Y�O IE6�A�бN12�אּ13
	WshShell.SendKeys("{TAB}");
WshShell.SendKeys("{ENTER}");
WScript.Sleep(500);