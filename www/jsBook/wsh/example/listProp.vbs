WScript.Echo "WScript=", WScript
WScript.Echo "WScript.Name=", WScript.Name
WScript.Echo "WScript.Version=", WScript.Version
WScript.Echo "WScript.ScriptName=", WScript.ScriptName
WScript.Echo "WScript.ScriptFullName=", WScript.ScriptFullName
WScript.Echo "WScript.Path=", WScript.Path

Set WshNetwork = WScript.CreateObject("WScript.Network")
WScript.Echo "WshNetwork.ComputerName=" & WshNetwork.ComputerName
WScript.Echo "WshNetwork.UserDomain=", WshNetwork.UserDomain
WScript.Echo "WshNetwork.UserName=", WshNetwork.UserName

Set objShell = WScript.CreateObject("WScript.Shell")
Set objSysEnv = objShell.Environment("SYSTEM")
WScript.Echo "There are", objSysEnv.length, "System environment variables." 