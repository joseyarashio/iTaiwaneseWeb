// 用法：cscript toUtf8.js file1 file2 file3 ...
// 功能：將 command line 所給的文字檔利用 notepad 轉成 utf-8 的格式
// 說明：
// 	如果輸入檔名是 test.txt，輸出檔名則是 text.txt_utf8
// 	注意：如果輸入檔名是相對路徑，則在使用前，必需確認 notepad 的預設儲存目錄是正確的目錄
// 	（若使用絕對路徑，則沒有上述顧慮。）

// 	Roger Jang, 20041125

args=WScript.Arguments;
if (args.Count()==0) {
	WScript.Echo("Usage: " + WScript.ScriptName + " file1 file2 file3 ...");
	WScript.Quit();
}

fso = new ActiveXObject("Scripting.FileSystemObject");

WshShell=new ActiveXObject("WScript.Shell");
WScript.Echo("Current directory: "+WshShell.CurrentDirectory);

// 列出所有的輸入參數
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

	//改檔名：test.txt_utf8.txt ===> test.txt_utf8
	fso.MoveFile(targetFile+".txt", targetFile);
	WScript.Sleep(1000);
}
