Set WshShell = WScript.CreateObject("WScript.Shell")
WshShell.RegWrite "HKCU\MyNewKey\", 1 ,"REG_DWORD"
WshShell.RegWrite "HKCU\MyNewKey\MyValue", "Hello world!"

WScript.Echo WshShell.RegRead("HKCU\MyNewKey\MyValue")
WScript.Echo WshShell.RegRead("HKCU\MyNewKey\")

WshShell.RegDelete "HKCU\MyNewKey\MyValue"
WshShell.RegDelete "HKCU\MyNewKey\" 
