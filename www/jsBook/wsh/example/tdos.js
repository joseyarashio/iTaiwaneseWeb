// 如何由 WSH 執行其他應用程式

oShell = WScript.CreateObject("WScript.Shell");
x=oShell.Exec("calc");
WScript.Echo(x.status);