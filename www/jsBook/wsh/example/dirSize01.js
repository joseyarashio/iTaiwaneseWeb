// 顯示檔案夾的大小

fso = new ActiveXObject("Scripting.FileSystemObject");
dirPath = "c:\\windows\\system32";
folderObj = fso.GetFolder(dirPath);
WScript.Echo(dirPath + " 目錄的大小是 " + folderObj.Size + " bytes.");