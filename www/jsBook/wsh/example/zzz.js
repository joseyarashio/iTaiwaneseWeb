// 使用 SendKeys 去開啟記事本並寫入文字、存檔

WshShell=new ActiveXObject("WScript.Shell");

WshShell.Run("notepad", 9);
WScript.Sleep(500);	// Give Notepad some time to load
line = "test: 張智星";
WScript.Echo(line);
WshShell.SendKeys(line);

WScript.Quit();

// 寫到檔案，沒問題
line = "這是中文!";
fso = new ActiveXObject("Scripting.FileSystemObject");
f=fso.OpenTextFile('test.txt', 2, true);
f.Write(line);
f.Close();
