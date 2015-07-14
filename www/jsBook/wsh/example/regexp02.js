// 抓出 WSH 程式碼（JScript）的第一註解列

// 讀取此檔案
localFile=WScript.ScriptFullName;
fso = new ActiveXObject("Scripting.FileSystemObject");
forReading=1, forWriting=2;
fid=fso.OpenTextFile(localFile, forReading);
content=fid.ReadAll();
fid.Close();
//WScript.Echo(content);

// 執行通用運算式
myRegExp = /\s*\/\/\s*(.*)/;
title = myRegExp.exec(content);

// 印出結果
WScript.Echo("第一註解列 = " + title[1]);