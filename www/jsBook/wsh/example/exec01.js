// 由 WSH 呼叫計算機

WshShell = new ActiveXObject("WScript.Shell");
oExec = WshShell.Exec("calc.exe");
// 若未開啟，持續等待，直至開啟完畢
while (oExec.Status == 0)
	WScript.Sleep(100);
// 印出相關訊息
WScript.Echo("Status = " + oExec.Status);
WScript.Echo("ProcessID = " + oExec.ProcessID);
WScript.Echo("ExitCode = " + oExec.ExitCode);