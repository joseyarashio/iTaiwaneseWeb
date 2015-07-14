// �Ϊk�Gcscript toUtf8.js file1 file2 file3 ...
// �\��G�N command line �ҵ�����r�ɧQ�� notepad �ন utf-8 ���榡
// �����G
// 	�p�G��J�ɦW�O test.txt�A��X�ɦW�h�O text.txt_utf8
// 	�`�N�G�p�G��J�ɦW�O�۹���|�A�h�b�ϥΫe�A���ݽT�{ notepad ���w�]�x�s�ؿ��O���T���ؿ�
// 	�]�Y�ϥε�����|�A�h�S���W�z�U�{�C�^

// 	Roger Jang, 20041125

args=WScript.Arguments;
if (args.Count()==0) {
	WScript.Echo("Usage: " + WScript.ScriptName + " file1 file2 file3 ...");
	WScript.Quit();
}

fso = new ActiveXObject("Scripting.FileSystemObject");

WshShell=new ActiveXObject("WScript.Shell");
WScript.Echo("Current directory: "+WshShell.CurrentDirectory);

// �C�X�Ҧ�����J�Ѽ�
WScript.Echo("No. of arguments = " + WScript.Arguments.Count());
for (i=0; i<args.length; i++){
	WScript.Echo("args("+i+")="+args(i));
	targetFile=args(i)+"_utf8";
	WScript.Echo("targetFile="+targetFile);
	// Delete the targetFile if it exists
	if (fso.FileExists(targetFile)){
		WScript.Echo("Deleting "+targetFile);
		f = fso.GetFile(targetFile);
		f.Delete();
		WScript.Sleep(500);
	}

	WshShell.Run("notepad "+args(i), 9);
	WScript.Sleep(500);	// Give Notepad some time to load
	WshShell.SendKeys("%{F}");
	WshShell.SendKeys("a");
	WshShell.SendKeys(targetFile);
	WshShell.SendKeys("{TAB}{TAB}{TAB}{TAB}");
	WshShell.SendKeys("{DOWN}{DOWN}{DOWN}{DOWN}");
	WshShell.SendKeys("{TAB}{TAB}{TAB}{TAB}{TAB}{TAB}{TAB}");
	WshShell.SendKeys("s");
	WshShell.SendKeys("%{F4}");
	WScript.Sleep(1000);

	//���ɦW�Gtest.txt_utf8.txt ===> test.txt_utf8
	fso.MoveFile(targetFile+".txt", targetFile);
	WScript.Sleep(1000);
}
