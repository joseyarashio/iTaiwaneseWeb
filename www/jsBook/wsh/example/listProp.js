// 列出各種物件的性質

WScript.Echo("WScript=" + WScript);
WScript.Echo("WScript.Name=" + WScript.Name);
WScript.Echo("WScript.FullName=" + WScript["FullName"]);
WScript.Echo("WScript.Version=" + WScript.Version);
WScript.Echo("WScript.ScriptName=" + WScript.ScriptName);
WScript.Echo("WScript.ScriptFullName=" + WScript.ScriptFullName);
WScript.Echo("WScript.Path=" + WScript.Path);
WScript.Echo("WScript.Application=" + WScript.Application);
WScript.Echo("WScript.StdIn=" + WScript.StdIn);
WScript.Echo("WScript.StdOut=" + WScript.StdOut);
WScript.Echo("WScript.Arguments=" + WScript.Arguments);


WScript.Echo(" ====== 列出 WScript 的所有性質：");
for (prop in WScript)
    WScript.Echo("WScript[" + prop + "] = " + WScript[prop]);

WshNetwork = new ActiveXObject("WScript.Network");
WScript.Echo("WshNetwork.ComputerName=" + WshNetwork.ComputerName);
WScript.Echo("WshNetwork.UserDomain=" + WshNetwork.UserDomain);
WScript.Echo("WshNetwork.UserName=" + WshNetwork.UserName);

WScript.Echo("typeof(WshNetwork)="+typeof(WshNetwork));
WScript.Echo(" ====== 列出 WScript.Network 的所有性質：");
for (prop in WshNetwork)
    WScript.Echo("WshNetwork[" + prop + "] = " + WshNetwork(prop));


WScript.Echo(" ====== 列出 WScript.Network 的所有性質：");
for (prop in WshNetwork)
    WScript.Echo("WshNetwork[" + prop + "] = " + WshNetwork(prop));


WScript.Echo(" ====== 列出 WScript.Network 的所有性質：");
var Enum=new Enumerator(WshNetwork) 
for (Enum.moveFirst(); !Enum.atEnd(); Enum.moveNext())
//	WScript.Echo(Enum.item()+" ===> "+WshSysEnv(Enum.item()));
	WScript.Echo(Enum.item());
