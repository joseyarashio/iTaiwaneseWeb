tempFile=getTempFile();
WScript.Echo("�Ȧs�ɮצW�� = "+tempFile);

// ���o�Ȧs�ɮת��W��
function getTempFile() {
	var fso, tempDir, tempFile, fullPath;
	fso = new ActiveXObject("Scripting.FileSystemObject");
	tempDir = fso.GetSpecialFolder(2);
	tempFile = fso.GetTempName();
	fullPath=tempDir.Path+"\\"+tempFile;
	return(fullPath);
}