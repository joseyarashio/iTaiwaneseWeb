// 使用 SendKeys 去開啟記事本並寫入文字、存檔於 junk.txt
// Roger Jang, 20081215, tested under Vista

outputFile="junk.txt";
WshShell=new ActiveXObject("WScript.Shell");
WshShell.Run("notepad", 9);	// Open notepad
WScript.Sleep(1000);		// Give Notepad some time to load
for (i=0; i<100; i++){
	WshShell.SendKeys(i+". Hello World!");
	WshShell.SendKeys("{ENTER}");
}
WshShell.SendKeys("%{F}");
WshShell.SendKeys("s");
WScript.Echo('Will input the file name in 5 sec...'); WScript.Sleep(5000);
WshShell.SendKeys(outputFile);
//WshShell.SendKeys("{TAB}{TAB}{ENTER}");
WScript.Echo('Will save the file in 5 sec...'); WScript.Sleep(5000);
WshShell.SendKeys("%{s}");
WScript.Echo('Will click yes in 5 sec...'); WScript.Sleep(5000);
WshShell.SendKeys("%{y}");
WScript.Echo('Will close the file in 5 sec...'); WScript.Sleep(5000);
WshShell.SendKeys("%{F4}");