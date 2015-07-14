iisObj = GetObject("IIS://LocalHost/W3SVC/1/Root");

prop=[
"AccessFlags",
"AccessNoRemoteExecute",
"AccessNoRemoteRead",
"AccessNoRemoteWrite",
"AccessRead",
"AccessScript",
"AccessSSL",
"AccessSSL128",
"AccessSSLFlags",
"AccessSSLMapCert",
"AccessSSLNegotiateCert",
"AccessSSLRequireCert",
"AccessWrite",
"AdminACL",
"AllowKeepAlive",
"AllowPathInfoForScriptMappings",
"AnonymousPasswordSync",
"AnonymousUserName",
"AnonymousUserPass",
"AppAllowClientDebug",
"AppAllowDebugging"];

prop=prop.sort();

//for (var i in iisObj)
for (i=0; i<prop.length; i++)
	WScript.Echo("iisObj." + prop[i] + " = " + eval("iisObj."+prop[i]));