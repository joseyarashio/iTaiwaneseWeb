// 在桌面建立記事本的捷徑

// 產生 WSH Shell
WSHShell = WScript.CreateObject("WScript.Shell");
// 使用SpecialFolders讀取桌面路徑
DesktopPath = WSHShell.SpecialFolders("Desktop");
// 於桌面上建立捷徑物件(shortcut object)
Shortcut1 = WSHShell.CreateShortcut(DesktopPath + "\\WSH 產生的記事本捷徑.lnk");
// 設定捷徑物件(shortcut object)的properties並儲存之
Shortcut1.TargetPath = "c:\\windows\\notepad.exe";
Shortcut1.Save();