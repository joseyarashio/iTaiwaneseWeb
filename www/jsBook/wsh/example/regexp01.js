// 使用通用表示法抓出一個網頁的標題

// 讀取硬碟中的網頁
localFile="test.htm"
fso = new ActiveXObject("Scripting.FileSystemObject");
forReading=1, forWriting=2;
fid=fso.OpenTextFile(localFile, forReading);
content=fid.ReadAll();
fid.Close();
//WScript.Echo(content);

// 執行通用運算式
myRegExp = /<title>(.*)<\/title>/i;
title = myRegExp.exec(content);

// 顯示結果
WScript.Echo("網頁標題 = " + title[1]);
WScript.Echo("網頁標題 = " + RegExp.$1);