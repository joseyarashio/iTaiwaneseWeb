// н╫зя Registry
//WSHShell = CreateObject("WScript.Shell")
WSHShell = new ActiveXObject("WScript.Shell");
 
// Create Registry Keys (HKCU = HKEY_CURRENT_USER)
WScript.Echo("Create key HKCU\\MyRegKey\\ with value 'Top level key'")
WSHShell.RegWrite("HKCU\\MyRegKey\\", "Top level key")
 
WScript.Echo("Create key HKCU\\MyRegKey\\Entry\\ with value 'Second level key'")
WSHShell.RegWrite("HKCU\\MyRegKey\\Entry\\", "Second level key")
 
WScript.Echo("Set value HKCU\\MyRegKey\\Value to REG_SZ 1")
WSHShell.RegWrite("HKCU\\MyRegKey\\Value", 1)
 
WScript.Echo("Set value HKCU\\MyRegKey\\Entry to REG_DWORD 2")
WSHShell.RegWrite("HKCU\\MyRegKey\\Entry", 2, "REG_DWORD")
 
WScript.Echo("Set value HKCU\\MyRegKey\\Entry\\Value1 to REG_BINARY 3")
WSHShell.RegWrite("HKCU\\MyRegKey\\Entry\\Value1", 3, "REG_BINARY")
 
// Read Registry Keys
//lcValue1 = WSHShell.RegRead("HKEY_LOCAL_MACHINE\\SYSTEM\\ControlSet002\\Services\\{13A0EE8C-3C61-4B78-8A88-CDFC7E981AA2}\\Parameters\\Tcpip\\IPAddress")
//WScript.Echo("Value of HKCU\\MyRegKey: " + lcValue1)

lcValue1 = WSHShell.RegRead("HKCU\\MyRegKey\\")
WScript.Echo("Value of HKCU\\MyRegKey: " + lcValue1)
 
lcValue2 = WSHShell.RegRead("HKCU\\MyRegKey\\Entry\\")
WScript.Echo("Value of HKCU\\MyRegKey\\Entry\\: " + lcValue2)
 
lcValue3 = WSHShell.RegRead("HKCU\\MyRegKey\\Value")
WScript.Echo("Value of HKCU\\MyRegKey\\Value: " + lcValue3)
 
lnValue1 = WSHShell.RegRead("HKCU\\MyRegKey\\Entry")
WScript.Echo("Value of HKCU\\MyRegKey\\Entry: " + STR(lnValue1))
 
lnValue3 = WSHShell.RegRead("HKCU\\MyRegKey\\Entry\\Value1")
WScript.Echo("Value of HKCU\\MyRegKey\\Entry\\Value1: " + ALLTRIM(STR(lnValue3(1))))

WScript.Quit(); 
 
// Delete Registry Keys
WScript.Echo( "Delete value HKCU\\MyRegKey\\Entry\\Value1")
WSHShell.RegDelete( "HKCU\\MyRegKey\\Entry\\Value1")
 
WScript.Echo("Delete key HKCU\\MyRegKey\\Entry")
WSHShell.RegDelete("HKCU\\MyRegKey\\Entry\\") 
 
WScript.Echo("Delete key HKCU\\MyRegKey")
WSHShell.RegDelete("HKCU\\MyRegKey\\") 
