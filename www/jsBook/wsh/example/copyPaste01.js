// �ϥ� SendKeys �h�}�ҰO�ƥ��üg�J��r�B�s�ɩ� junk.txt

outputFile="junk.txt";
fso = new ActiveXObject( "Scripting.FileSystemObject" );

// �p�G�ɮ� junk.txt �w�g�s�b�A���R��
if (fso.FileExists(outputFile)){
	WScript.Echo("Deleting " + outputFile);
	f = fso.GetFile(outputFile);
	f.Delete();
}
WScript.Sleep(500);

str="�o�O�@�Ӵ���";
tempFile="jjj.txt";
fid=fso.OpenTextFile(tempFile, 2, true );	// Open for writing, create
fid.Write(str);
fid.Close();

// �}�ɨë������e
WshShell=new ActiveXObject("WScript.Shell");
WshShell.Run("notepad "+tempFile, 9);
WScript.Sleep(500);	// Give Notepad some time to load
WshShell.SendKeys("^a");
WshShell.SendKeys("^c");
WshShell.SendKeys("%{F4}");
WScript.Quit();

WshShell.SendKeys("%{F}");
WshShell.SendKeys("s");
WshShell.SendKeys(outputFile);
WshShell.SendKeys("{TAB}{TAB}{ENTER}");
WshShell.SendKeys("%{F4}");