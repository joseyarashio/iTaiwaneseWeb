// 更改登錄（Registry）資料

Sh = new ActiveXObject("WScript.Shell");
key =  "HKEY_CURRENT_USER\\"
Sh.RegWrite( key + "WSHTest\\", "testkeydefault");
Sh.RegWrite( key + "WSHTest\\string1", "testkeystring1");
Sh.RegWrite( key + "WSHTest\\string2", "testkeystring2", "REG_SZ");
Sh.RegWrite( key + "WSHTest\\string3", "testkeystring3", "REG_EXPAND_SZ");
Sh.RegWrite( key + "WSHTest\\int", 123, "REG_DWORD");
WScript.Echo( Sh.RegRead(key + "WSHTest\\"));
WScript.Echo ( Sh.RegRead(key + "WSHTest\\string1"));
WScript.Echo ( Sh.RegRead(key + "WSHTest\\string2"));
WScript.Echo ( Sh.RegRead(key + "WSHTest\\string3"));
WScript.Echo ( Sh.RegRead(key + "WSHTest\\int"));
Sh.RegDelete(key + "WSHTest\\");

WScript.Echo (Sh.RegRead("HKEY_LOCAL_MACHINE\\SYSTEM\\ControlSet002\\Services\\{13A0EE8C-3C61-4B78-8A88-CDFC7E981AA2}\\Parameters\\Tcpip\\IPAddress"));

//' VBScript.
//Set Sh = CreateObject("WScript.Shell")
//key =  "HKEY_CURRENT_USER\"
//Sh.RegWrite key & "WSHTest\", "testkeydefault"
//Sh.RegWrite key & "WSHTest\string1", "testkeystring1"
//Sh.RegWrite key & "WSHTest\string2", "testkeystring2", "REG_SZ"
//Sh.RegWrite key & "WSHTest\string3", "testkeystring3", "REG_EXPAND_SZ"
//Sh.RegWrite key & "WSHTest\int", 123, "REG_DWORD"
//WScript.Echo Sh.RegRead(key & "WSHTest\")
//WScript.Echo Sh.RegRead(key & "WSHTest\string1")
//WScript.Echo Sh.RegRead(key & "WSHTest\string2")
//WScript.Echo Sh.RegRead(key & "WSHTest\string3")
//WScript.Echo Sh.RegRead(key & "WSHTest\int")
//Sh.RegDelete key & "WSHTest\"
