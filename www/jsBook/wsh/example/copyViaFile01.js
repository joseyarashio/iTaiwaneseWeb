// �N�r������ܰŶKï

str="�R�ڪ��H�M�ڷR���H";
copyViaFile(str);
WScript.Echo("�w�N�r��u"+str+"�v�����ܰŶKï�I");


// ���o�Ȧs�ɮת��W��
function getTempFile() {
	var fso, tempDir, tempFile, fullPath;
	fso = new ActiveXObject("Scripting.FileSystemObject");
	tempDir = fso.GetSpecialFolder(2);
	tempFile = fso.GetTempName();
	fullPath=tempDir.Path+"\\"+tempFile;
	return(fullPath);
}

// �N�@�Ӧr��e��ŶKï�]�g���ɮ�Ū�g�^
function copyViaFile(str){
	var fso, tempFile, fid;
	fso = new ActiveXObject("Scripting.FileSystemObject");
	// �N�r��g���ɮ�
	tempFile=getTempFile();
	fid=fso.OpenTextFile(tempFile, 2, true );	// Open for writing, create
	fid.Write(str);
	fid.Close();
	// �}�ɡB�������e�B����
	WshShell=new ActiveXObject("WScript.Shell");
	WshShell.Run("notepad "+tempFile, 9);
	WScript.Sleep(500);	// Give Notepad some time to load
	WshShell.SendKeys("^a");
	WshShell.SendKeys("^c");
	WshShell.SendKeys("%{F4}");
}