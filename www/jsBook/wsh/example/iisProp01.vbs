Set IIsObj = GetObject("IIS://LocalHost/W3SVC/1/Root") 
'AccessExecute = IIsObj.Get("AccessExecute") 
'WScript.Echo AccessExecute 
WScript.Echo "AccessExecute = " & IIsObj.AccessExecute 

WScript.Echo "AccessFlags  = " & IIsObj.AccessFlags  
WScript.Echo "AccessNoRemoteExecute = " & IIsObj.AccessNoRemoteExecute 
WScript.Echo "AccessNoRemoteRead = " & IIsObj.AccessNoRemoteRead 
WScript.Echo "AccessNoRemoteWrite = " & IIsObj.AccessNoRemoteWrite 
WScript.Echo "AccessRead = " & IIsObj.AccessRead 
WScript.Echo "AccessScript = " & IIsObj.AccessScript 
WScript.Echo "AccessSSL = " & IIsObj.AccessSSL 
WScript.Echo "AccessSSL128 = " & IIsObj.AccessSSL128 
WScript.Echo "AccessSSLFlags = " & IIsObj.AccessSSLFlags 
WScript.Echo "AccessSSLMapCert = " & IIsObj.AccessSSLMapCert 
WScript.Echo "AccessSSLNegotiateCert = " & IIsObj.AccessSSLNegotiateCert 
WScript.Echo "AccessSSLRequireCert = " & IIsObj.AccessSSLRequireCert 
WScript.Echo "AccessWrite = " & IIsObj.AccessWrite 
'WScript.Echo "AdminACL = " & IIsObj.AdminACL 
'WScript.Echo "AllowKeepAlive = " & IIsObj.AllowKeepAlive 
'WScript.Echo "AllowPathInfoForScriptMappings = " & IIsObj.AllowPathInfoForScriptMappings 
WScript.Echo "AnonymousPasswordSync = " & IIsObj.AnonymousPasswordSync 
WScript.Echo "AnonymousUserName = " & IIsObj.AnonymousUserName 
WScript.Echo "AnonymousUserPass = " & IIsObj.AnonymousUserPass 
WScript.Echo "AppAllowClientDebug = " & IIsObj.AppAllowClientDebug 
WScript.Echo "AppAllowDebugging = " & IIsObj.AppAllowDebugging 

