// �ϥ� SendKeys �h�}�ҰO�ƥ��üg�J��r�B�s�ɩ� junk.txt
// Roger Jang, 20081215, tested under Vista

outputFile="junk.txt";

// �p�G�ɮ� junk.txt �w�g�s�b�A���R��
//fso = new ActiveXObject( "Scripting.FileSystemObject" );
//if (fso.FileExists(outputFile)){
//	WScript.Echo("Deleting " + outputFile);
//	f = fso.GetFile(outputFile);
//	f.Delete();
//}
//WScript.Sleep(500);

// �N�@�Ǥ�r�e��O�ƥ��A�æs��
WshShell=new ActiveXObject("WScript.Shell");
WshShell.Run("notepad", 9);
WScript.Sleep(500);	// Give Notepad some time to load
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