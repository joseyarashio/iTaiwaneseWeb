tempFile=getTempFile();
WScript.Echo("暫存檔案名稱 = "+tempFile);

// 取得暫存檔案的名稱
function getTempFile() {
	var fso, tempDir, tempFile, fullPath;
	fso = new ActiveXObject("Scripting.FileSystemObject");
	tempDir = fso.GetSpecialFolder(2);
	tempFile = fso.GetTempName();
	fullPath=tempDir.Path+"\\"+tempFile;
	return(fullPath);
}