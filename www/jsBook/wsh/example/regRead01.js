// 對 Registry 進行讀取
shell = WScript.CreateObject("WScript.Shell");
// 顯示 CPU 型號
regKey = "HKLM\\Hardware\\Description\\System\\CentralProcessor\\0\\Identifier";
WScript.Echo("CPU 型號：" + shell.RegRead(regKey));
// 顯示 Service Pack 版本
regKey = "HKLM\\SOFTWARE\\Microsoft\\Windows NT\\CurrentVersion\\CSDVersion";
WScript.Echo("Service Pack 版本：" + shell.RegRead(regKey));