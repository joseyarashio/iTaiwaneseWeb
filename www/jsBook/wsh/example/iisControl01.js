// 使用 WSH 來控制 IIS
IIsObj = GetObject("IIS://LocalHost/W3SVC/1");
IIsObj.Pause();
WScript.Echo("暫停 IIS 伺服器！");
IIsObj.Continue();
WScript.Echo("繼續 IIS 伺服器！");
IIsObj.Stop();
WScript.Echo("停止 IIS 伺服器！");
IIsObj.Start();
WScript.Echo("啟動 IIS 伺服器！");