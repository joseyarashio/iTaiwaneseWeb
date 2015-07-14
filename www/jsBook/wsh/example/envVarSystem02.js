// 所有的 SYSTEM 環境變數列表

shell = WScript.CreateObject("WScript.Shell");
envObj = shell.Environment("SYSTEM");
WScript.Echo("所有的 SYSTEM 環境變數列表：");
WScript.Echo("No. of env. variables = "+envObj.length);
var Enum=new Enumerator(envObj) 
for (Enum.moveFirst(); !Enum.atEnd(); Enum.moveNext())
	WScript.Echo(Enum.item());