// �p��� WSH �����L���ε{��

oShell = WScript.CreateObject("WScript.Shell");
x=oShell.Exec("calc");
WScript.Echo(x.status);