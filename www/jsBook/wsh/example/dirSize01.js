// ����ɮק����j�p

fso = new ActiveXObject("Scripting.FileSystemObject");
dirPath = "c:\\windows\\system32";
folderObj = fso.GetFolder(dirPath);
WScript.Echo(dirPath + " �ؿ����j�p�O " + folderObj.Size + " bytes.");