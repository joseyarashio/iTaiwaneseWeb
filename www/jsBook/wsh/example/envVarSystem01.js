// 列出重要的環境變數

wshShell = WScript.CreateObject("WScript.Shell");
wshSysEnv = wshShell.Environment("SYSTEM");
WScript.Echo("重要的環境變數：");
name="windir"; WScript.Echo(name+" = "+wshSysEnv(name));
name="path"; WScript.Echo(name+" = "+wshSysEnv(name));
name="NUMBER_OF_PROCESSORS"; WScript.Echo(name+" = "+wshSysEnv(name));
name="OS"; WScript.Echo(name+" = "+wshSysEnv(name));
name="PROCESSOR_ARCHITECTURE"; WScript.Echo(name+" = "+wshSysEnv(name));
name="temp"; WScript.Echo(name+" = "+wshSysEnv(name));