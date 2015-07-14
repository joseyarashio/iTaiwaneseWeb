//=====================================
// access network files and printers
//=====================================

var WshNetwork = WScript.CreateObject("WScript.Network");
WshNetwork.MapNetworkDrive ("E:", "\\\\Server\\Public");


var PrinterPath = "\\\\ServerName\\PrinterName";
WshNetwork.AddWindowsPrinterConnection(PrinterPath);
WshNetwork.SetDefaultPrinter(PrinterPath);

 

//=======================================
// environment variables
//=======================================
var WshShell = WScript.CreateObject("WScript.Shell");
var WshSysEnv = WshShell.Environment("SYSTEM");
WScript.Echo(WshSysEnv("PATH"));

//=======================================
// special folder path
//=======================================
strDesktop = WshShell.SpecialFolders("Desktop");
WScript.Echo(strDesktop);