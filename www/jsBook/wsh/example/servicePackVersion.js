// 顯示現在所用 Service Pack 的版本

try {
	shell = new ActiveXObject( "WScript.Shell" );
	regkey = "HKLM\\SOFTWARE\\Microsoft\\Windows NT\\CurrentVersion\\CSDVersion";
	result = "目前 Service Pack 的版本："+shell.RegRead(regkey);
} catch(errObj){
	result="Error: " + errObj.description;
}
WScript.Echo(result);