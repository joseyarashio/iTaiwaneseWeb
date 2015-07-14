// 列出 IIS 網頁伺服器的性質

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
prop=prop.sort();	// 排序以利觀看
for (i=0; i<prop.length; i++)
	WScript.Echo("iisObj." + prop[i] + " = " + eval("iisObj."+prop[i]));