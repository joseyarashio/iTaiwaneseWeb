// 列出重要的的環境變數
// http://msdn.microsoft.com/library/default.asp?url=/library/en-us/script56/html/wsproenvironment.asp

shell = WScript.CreateObject("WScript.Shell");
envObj = shell.Environment("SYSTEM");

WScript.Echo(" ====== 重要的環境變數：");
name="windir";
WScript.Echo(name+" ===> "+envObj(name));
name="path";
WScript.Echo(name+" ===> "+envObj(name));
name="NUMBER_OF_PROCESSORS";
WScript.Echo(name+" ===> "+envObj(name));
name="Process";
WScript.Echo(name+" ===> "+envObj(name));
name="OS";
WScript.Echo(name+" ===> "+envObj(name));
name="PROCESSOR_ARCHITECTURE";
WScript.Echo(name+" ===> "+envObj(name));
name="temp";
WScript.Echo(name+" ===> "+WshSysEnv(name));

WScript.Echo(" ====== 列出變數型態：");
WScript.Echo("typeof(WshNetwork)="+typeof(WshNetwork));
WScript.Echo("typeof(theEnv)="+typeof(theEnv));
WScript.Echo("typeof(Enum)="+typeof(Enum));