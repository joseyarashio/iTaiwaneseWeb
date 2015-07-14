// 如何由 WSH 執行其他應用程式

shell = WScript.CreateObject("WScript.Shell");	// 產生 WSH Shell
shell.Run("cmd /K dir");			// 開啟 DOS 命令視窗並執行 dir
shell.Run("wordpad.exe run01.js");		// 開啟記事本並載入本檔案
