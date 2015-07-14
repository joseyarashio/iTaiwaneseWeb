// 使用 WSH 來顯示目前工作目錄，及改變目前工作目錄

WshShell=new ActiveXObject("WScript.Shell");
WScript.Echo("目前工作目錄："+WshShell.CurrentDirectory);
WshShell.CurrentDirectory = "c:\\windows\\temp";
WScript.Echo("改變目前工作目錄至："+WshShell.CurrentDirectory);
