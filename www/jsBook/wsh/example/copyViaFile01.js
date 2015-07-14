// 將字串拷貝至剪貼簿

str="愛我的人和我愛的人";
copyViaFile(str);
WScript.Echo("已將字串「"+str+"」拷貝至剪貼簿！");


// 取得暫存檔案的名稱
function getTempFile() {
	var fso, tempDir, tempFile, fullPath;
	fso = new ActiveXObject("Scripting.FileSystemObject");
	tempDir = fso.GetSpecialFolder(2);
	tempFile = fso.GetTempName();
	fullPath=tempDir.Path+"\\"+tempFile;
	return(fullPath);
}

// 將一個字串送到剪貼簿（經由檔案讀寫）
function copyViaFile(str){
	var fso, tempFile, fid;
	fso = new ActiveXObject("Scripting.FileSystemObject");
	// 將字串寫到檔案
	tempFile=getTempFile();
	fid=fso.OpenTextFile(tempFile, 2, true );	// Open for writing, create
	fid.Write(str);
	fid.Close();
	// 開檔、拷貝內容、關檔
	WshShell=new ActiveXObject("WScript.Shell");
	WshShell.Run("notepad "+tempFile, 9);
	WScript.Sleep(500);	// Give Notepad some time to load
	WshShell.SendKeys("^a");
	WshShell.SendKeys("^c");
	WshShell.SendKeys("%{F4}");
}