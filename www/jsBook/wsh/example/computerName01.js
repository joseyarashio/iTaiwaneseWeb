// 列印電腦名稱、網域名稱、使用者名稱

wshNetwork=WScript.CreateObject("WScript.Network");
WScript.Echo("電腦名稱：" + wshNetwork.ComputerName);
WScript.Echo("網域名稱：" + wshNetwork.UserDomain);
WScript.Echo("使用者名稱：" + wshNetwork.UserName);