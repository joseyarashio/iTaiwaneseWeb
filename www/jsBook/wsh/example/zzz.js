// �ϥ� SendKeys �h�}�ҰO�ƥ��üg�J��r�B�s��

WshShell=new ActiveXObject("WScript.Shell");

WshShell.Run("notepad", 9);
WScript.Sleep(500);	// Give Notepad some time to load
line = "test: �i���P";
WScript.Echo(line);
WshShell.SendKeys(line);

WScript.Quit();

// �g���ɮסA�S���D
line = "�o�O����!";
fso = new ActiveXObject("Scripting.FileSystemObject");
f=fso.OpenTextFile('test.txt', 2, true);
f.Write(line);
f.Close();
