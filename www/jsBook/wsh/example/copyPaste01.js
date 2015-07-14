// 使用 SendKeys 去開啟記事本並寫入文字、存檔於 junk.txt

outputFile="junk.txt";
fso = new ActiveXObject( "Scripting.FileSystemObject" );

// 如果檔案 junk.txt 已經存在，先刪除
if (fso.FileExists(outputFile)){
	WScript.Echo("Deleting " + outputFile);
	f = fso.GetFile(outputFile);
	f.Delete();
}
WScript.Sleep(500);

str="這是一個測試";
tempFile="jjj.txt";
fid=fso.OpenTextFile(tempFile, 2, true );	// Open for writing, create
fid.Write(str);
fid.Close();

// 開檔並拷貝內容
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