// 列出此 WSH 檔案所具有的屬性

fso = new ActiveXObject( "Scripting.FileSystemObject" );
fileObj = fso.GetFile(WScript.ScriptFullName);
WScript.Echo("WScript.ScriptFullName = " + WScript.ScriptFullName);
prop=[
	"Attributes",
	"Size",
	"DateCreated",
	"DateLastAccessed",
	"DateLastModified",
	"Drive",
	"Name",
	"ParentFolder",
	"ShortName",
	"ShortPath",
	"Type"]
for (i=0; i<prop.length; i++)
	WScript.Echo("fileObj." + prop[i] + " = " + eval("fileObj."+prop[i]));