' �� WSH �I�s�p���
Dim WshShell,oExec

Set WshShell = wscript.createobject("wscript.shell")
Set oExec = WshShell.Exec("calc.exe")

WScript.Echo oExec.Status
WScript.Echo oExec.ProcessID
WScript.Echo oExec.ExitCode 