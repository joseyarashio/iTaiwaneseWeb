// �Ҧ��� PROCESS �����ܼƦC��

shell = WScript.CreateObject("WScript.Shell");
envObj = shell.Environment("PROCESS");
WScript.Echo("�Ҧ��� PROCESS �����ܼƦC��G");
WScript.Echo("No. of env. variables = "+envObj.length);
var Enum=new Enumerator(envObj) 
for (Enum.moveFirst(); !Enum.atEnd(); Enum.moveNext())
	WScript.Echo(Enum.item());