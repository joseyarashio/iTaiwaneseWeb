// 如何由 WSH 執行其他應用程式，並等待應用程式結束後才繼續執行 WSH 程式碼

shell = new ActiveXObject("WScript.Shell");
intReturn = shell.Run("notepad " + WScript.ScriptFullName, 1, true);
shell.Popup("記事本已經被關閉！");